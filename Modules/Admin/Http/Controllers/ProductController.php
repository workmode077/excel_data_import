<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon; 
use Modules\Admin\Entities\Product;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\ProductPostRequest;
use Modules\Admin\Http\Requests\ImportPostRequest;
use Illuminate\Support\Facades\Validator;
use App\Traits\LogError;


class ProductController extends Controller
{
    use LogError;


     // LIST PAGE START
    public function productPage()                                                                                      //LIST                                                 
    {
        try {
            return view('admin::product.list');            
        } catch (\Exception $e) {
            $this->logError($e); 
            return view('admin::product.list')->with('error', 'Error occurred while adding the data.');
        }     
    }
    // LIST PAGE END

    // DATATABLE START
    public function productList(Request $request)                                                                                  
    {
        try {
            $dataList = (new Product())->listProduct($request);
            echo json_encode($dataList);     
        } catch (\Exception $e) {
             $this->logError($e); 
            return view('admin::product.list')->with('error','something went wrong');
        }              
    }
     // DATATABLE END

    // IMPORT FUNCTION START
    public function importCSV(ImportPostRequest $request)
    {
        try {
            $file = $request->file('file');
            if (!$file) {                        // Check if a file was uploaded
                throw new Exception('No file uploaded.');
            }
    
            $fileContents = collect(file($file->getPathname()));
            
            $fileContents->shift();            // Skip the first row (header)
    
            $products = [];
            $errors = [];
            $existingProducts = Product::pluck('name')->toArray();       // Assuming 'name' is the unique field
    
            foreach ($fileContents as $index => $line) {
                $data = str_getcsv($line);
                $validator = Validator::make([
                    'name' => $data[0],
                    'description' => $data[1],
                    'price' => $data[2],
                ], [
                    'name' => 'required|string|max:255',
                    'description' => 'required|string|max:255',
                    'price' => 'required|numeric',
                ]);
    
                if ($validator->fails()) {
                    $errors[] = "Row " . ($index + 2) . ": " . implode(', ', $validator->errors()->all());
                } else {
                    if (in_array($data[0], $existingProducts)) {
                        $errors[] = "Row " . ($index + 2) . ": Duplicate entry for name '{$data[0]}'";
                    } else {
                        $products[] = [
                            'name' => $data[0],
                            'description' => $data[1],
                            'price' => $data[2],
                            'status' => 1,
                            'created_at' => Carbon::now(),
                        ];
                        $existingProducts[] = $data[0]; // Add the name to the list of existing products
                    }
                }
            }
    
            if (!empty($errors)) {
                return redirect()->back()->withErrors($errors)->withInput();
            }
    
            // Insert the data in bulk
            Product::insert($products);
    
            return redirect()->back()->with('success', 'CSV file imported successfully.');
        } catch (Exception $e) {
            // Handle exception and redirect back with error message
            return redirect()->back()->withErrors(['file' => 'Error importing file: ' . $e->getMessage()])->withInput();
        }
    }
    // IMPORT FUNCTION END

    // ADD PAGE START
    public function productView()                                                                                                               
    {
       try {
            return view('admin::product.add');     
        } catch (\Exception $e) {
             $this->logError($e); 
            return view('admin::product.list')->with('error','Something went wrong');
        } 
    }
    // ADD PAGE END

   
    // STORE FUNCTION START
    public function productStore(ProductPostRequest $request)                                                    
    {
      try {
            $storeData = Product::create([
                'name'  =>  $request->name,
                'description'  =>  $request->description,
                'price'  =>  $request->price,
                'status'  =>  $request->status,
            ]);
    
            return redirect('product')->with('status', 'Added Successfully');
        } catch (\Exception $e) {
            $this->logError($e); 
            return redirect('product')->with('error', 'Error occurred while adding the data.');
        }
    }
    // STORE FUNCTION START
    

    //  EDIT PAGE START
    public function productEdit(Request $request)                                                                  
    {
        try {
            $id =   decrypt($request->id);
            $data=  Product::where('id',$id)->first();
            return view('admin::product/edit',compact('data'));      
        } catch (\Exception $e) {
            $this->logError($e); 
            return view('admin::product.list')->with('error','Something went wrong');
        } 
    }
    //  EDIT PAGE END

     //  UPADE FUNCTION START
    public function productUpdate(ProductPostRequest $request)                                                     
    {
        try {
            $dataUpdate = Product::find($request->id);
            $dataUpdate->name  =  $request->name;
            $dataUpdate->description  =  $request->description;
            $dataUpdate->price  =  $request->price;
            $dataUpdate->status  =  $request->status;
            $dataUpdate->save();
    
            return redirect('product')->with('status', 'Updated Successfully');
        } catch (\Exception $e) {
            $this->logError($e); 
            return redirect('product')->with('error', 'Error occurred while updating the data.');
        }
    }
    //  UPDATE FUNCTION END

     // DELETE FUNCTION START
    public function productDelete(Request $request)                                                                                                              
    {    
        try {
            $deleteData = Product::where('id',$request->id)->delete();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            $this->logError($e); 
            return response()->json(['status' => 'error', 'message' => 'An error occurred while updating  status.']);
        }
    }
     // DELETE FUNCTION END


     // STATUS FUNCTION START 
     public function statusUpdate(Request $request)                                                                   
     {
        
         try {
             $chanageStatus = Product::where('id', $request->id)
                     ->update([
                         'status' => $request->status,
                     ]);
     
                 return response()->json(['status' => 'success']);
         
         } catch (\Exception $e) {
             $this->logError($e); 
             return response()->json(['status' => 'error', 'message' => 'An error occurred while updating  status.']);
         }
     }
     // STATUS FUNCTION END

}

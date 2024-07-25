<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','status','created_at'];

    public $timestamps = true;
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductFactory::new();
    }
    public function listProduct($request)
    {
        $search   =   $request->search['value'];
        $type     =   $request->type;
        $sort     =   $request->order;
        $column   =   $sort[0]['column'];
        $order    =   $sort[0]['dir'] == 'asc' ? "ASC" : "DESC" ;
        $admins   =   self::whereNotNull('id');
        if ($search != '') 
        {
            $admins=$admins->where('name', 'LIKE', '%'.$search.'%');
        }
        $total  = $admins->count();
        if ($column == 0) {
            $admins->orderBy('id', $order);
            if ($order == 'ASC') {
                $i = 1;
            }
            else{
                $i = $total;
            }
        } else {
            $admins->orderBy('id', 'desc');
            $i = 1;
        }
        $admins=$admins->take($request->length)->skip($request->start)->orderBy('id','desc')->get();

        foreach ($admins as $admin) {
            $admin->encrypt_id = encrypt($admin->id);
            $admin->recordId = $i;
            if ($order == 'ASC') {
                $i++;
            }
            else{
                $i--;
            }
        }
        $result['data']             =   $admins;
        $result['recordsTotal']     =   $total;
        $result['recordsFiltered']  =   $total;
        return $result;
    }
}

<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Like_model extends Model
{
    protected $table = 'tr_like'; 
    protected $primaryKey = 'lke_id';

    protected $allowedFields = ['lke_pht_id', 
                                'lke_usr_id',
                                'lke_date'];

    // public function getUser($id = false)
    // {
    //     return $this->where('usr_id', $id)
    //                     ->get()
    //                     ->getRowArray();
    // }
}
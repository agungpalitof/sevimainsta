<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Photo_model extends Model
{
    protected $table = 'ms_photo'; 
    protected $primaryKey = 'pht_id';

    protected $allowedFields = ['pht_usr_id', 
                                'pht_description',
                                'pht_date',
                                'pht_image',
                                'pht_lke_status',
                                'pht_cmn_status',
                                'pht_private',
                                'pht_status'];
    
	public function getPhoto($id)
    { 
        return $this->where('pht_usr_id', $id)
                    ->get()
                    ->getResultArray(); 
    }
}
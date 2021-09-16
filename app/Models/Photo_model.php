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

    public function getAllPhoto($id)
    { 
        $data = $this->db->table('ms_photo as a');
        $data->select('a.*, b.usr_nama'); 
        $data->join('ms_user as b', 'a.pht_usr_id = b.usr_id');
        // $data->join('ms_like as c', 'a.pht_lke_id = b.usr_id');
        // $data->join('ms_comment as d', 'a.pht_usr_id = b.usr_id');
        $data->orderBy('rand()');
        $result = $data->get()->getResultArray();
        return $result; 
    }
}
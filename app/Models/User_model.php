<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class User_model extends Model
{
    protected $table = 'ms_user'; 
    protected $primaryKey = 'usr_id';

    protected $allowedFields = ['usr_nama', 
                                'usr_username',
                                'usr_password'];
    
	public function mGetLogin($username, $password)
    {
        return  $this	->where('usr_username',$username)
                        ->where('usr_password', md5($password))
                        ->select('usr_id, usr_username')
        				->get()
                        ->getRowArray();
    }

    public function getUser($id = false)
    {
        if($id == false)
        {
            return $this->get()
                        ->getResultArray();
        }
        else
        {
            return $this->where('usr_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }
}
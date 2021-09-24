<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoVehiculo_model extends CI_Model
{
    /**
     *  Construtor
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function obtenertipovehiculo($idtipovehiculo)
    {
        return $this->db->get_where('tipovehiculo',array('idtipovehiculo'=>$idtipovehiculo))->row_array();
    }

    function obtenerLogintipovehiculo($idtipovehiculo)
    {

        return $this->db->get_where('tipovehiculo',array('idtipovehiculo'=>$idtipovehiculo))->row_array();
    }
    
    function contartipovehiculo()
    {
        $this->db->from('tipovehiculo');
        return $this->db->count_all_results();
    }

    function contartipovehiculosLogin($login)
    {
        $this->db->from('tipovehiculo');
        $this->db->where('login',$login);
        return $this->db->count_all_results();
    }

    public function obteneridtipovehiculo($login){
        $this->db->select("idtipovehiculo");
        $this->db->from("tipovehiculo");
        $this->db->where("login",$login);
        $r = $this->db->get();
        $resultado = $r->row();
        return $resultado->idtipovehiculo;             
    }
        
    function todotipovehiculos()
    {
        $this->db->order_by('idtipovehiculo', 'asc');
        $this->db->Where('estado', '1');
        return $this->db->get('tipovehiculo')->result_array();
    }
        
    function guardartipovehiculo($params)
    {
        $this->db->insert('tipovehiculo',$params);
        return $this->db->insert_id();
    }
    
    function modificartipovehiculo($idtipovehiculo,$params)
    {
        $this->db->where('idtipovehiculo',$idtipovehiculo);
        return $this->db->update('tipovehiculo',$params);
    }
    
    function eliminartipovehiculo($idtipovehiculo, $estado)
    {
        $this->db->set('estado', $estado , FALSE);
        $this->db->where('idtipovehiculo', $idtipovehiculo);
        $this->db->update('tipovehiculo'); 
    }

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo_model extends CI_Model
{
    /**
     *  Construtor
     */
    function __construct()
    {
        parent::__construct();
    }
    
    function obtenervehiculo($idvehiculo)
    {
        return $this->db->get_where('vehiculo',array('idVehiculo'=>$idvehiculo))->row_array();
    }

    function obtenerLoginvehiculo($idvehiculo)
    {

        return $this->db->get_where('vehiculo',array('idVehiculo'=>$idvehiculo))->row_array();
    }
    
    function contarvehiculo()
    {
        $this->db->from('vehiculo');
        return $this->db->count_all_results();
    }

    function contarvehiculosLogin($login)
    {
        $this->db->from('vehiculo');
        $this->db->where('login',$login);
        return $this->db->count_all_results();
    }

    public function obteneridvehiculo($login){
        $this->db->select("idVehiculo");
        $this->db->from("vehiculo");
        $this->db->where("login",$login);
        $r = $this->db->get();
        $resultado = $r->row();
        return $resultado->idVehiculo;             
    }
        
    function todosLosvehiculos()
    {
        $this->db->order_by('idVehiculo', 'asc');
        $this->db->Where('estado', '1');
        return $this->db->get('vehiculo')->result_array();
    }
        
    function guardarvehiculo($params)
    {
        $this->db->insert('vehiculo',$params);
        return $this->db->insert_id();
    }
    
    function modificarvehiculo($idvehiculo,$params)
    {
        $this->db->where('idVehiculo',$idvehiculo);
        return $this->db->update('vehiculo',$params);
    }
    
    function eliminarvehiculo($idvehiculo, $estado)
    {
        $this->db->set('estado', $estado , FALSE);
        $this->db->where('idVehiculo', $idvehiculo);
        $this->db->update('vehiculo'); 
    }

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vehiculo extends CI_Controller{
   
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vehiculo_model');
        $this->load->model('TipoVehiculo_model');
        $this->load->model('Socio_model');
        
    } 

    function index()
    {
        $data['vehiculo'] = $this->Vehiculo_model->todosLosvehiculos();
        
        $this->load->view('layout/header');
        $this->load->view('vehiculo/index',$data);
        $this->load->view('layout/footer');
    }

    function insert()
    {       
        $data['tipovehiculo'] = $this->TipoVehiculo_model->todotipovehiculos();
        $data['socio'] = $this->Socio_model->todosLosSocios();
        $this->load->view('layout/header');
        $this->load->view('vehiculo/add',$data);
        $this->load->view('layout/footer');
    }

    function add()
    {   
        $this->formValidation();
        if($this->form_validation->run())     
        {   
                $datos = $this->datos();
                $usuario_id = $this->Vehiculo_model->guardarvehiculo($datos);
                redirect('vehiculo/index');
        }
        else
        {   
            $data['tipovehiculo'] = $this->TipoVehiculo_model->todotipovehiculos();
            $data['socio'] = $this->Socio_model->todosLosSocios();
            $this->load->view('layout/header');
            $this->load->view('vehiculo/add',$data);
            $this->load->view('layout/footer');
        }
    }

    public function modificar($idvehiculo)
    {
        $data['tipovehiculo'] = $this->TipoVehiculo_model->todotipovehiculos();
        $data['socio'] = $this->Socio_model->todosLosSocios();
        $data['ve']=$this->Vehiculo_model->obtenervehiculo($idvehiculo);
        $this->load->view('layout/header');
        $this->load->view('vehiculo/editar',$data);
        $this->load->view('layout/footer');    
    }

    function modificarBD()
    {   
        $idvehiculo = $this->input->post('idVehiculo');
        $this->formValidation();
        if($this->form_validation->run())     
        {   
                
                $datos = $this->datos();
                $usuario_id = $this->Vehiculo_model->modificarvehiculo($idvehiculo, $datos);
                redirect('vehiculo/index');
            
        }
        else
        {            
            $this->load->view('layout/header');
            $this->load->view('vehiculo/add');
            $this->load->view('layout/footer');
        }
    }
    
    public function eliminarvehiculo($idvehiculo)
    {

        $params = 0;

            $this->Vehiculo_model->eliminarvehiculo($idvehiculo,$params);
            //redirect(base_url().CPersona,refesh);
            $data['vehiculo'] = $this->Vehiculo_model->todosLosvehiculos();
            $this->load->view('layout/header');
            $this->load->view('vehiculo/index',$data);
            $this->load->view('layout/footer');
    }

    public function formValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('socio','Socio','required');
        $this->form_validation->set_rules('placa','Placa','required|min_length[6]|max_length[10]|alpha_dash');
        $this->form_validation->set_rules('marca','Marca','required|min_length[4]|max_length[30]|alpha');
        $this->form_validation->set_rules('color','Color','required|min_length[4]|max_length[25]|alpha');
        $this->form_validation->set_rules('color','Color','required|min_length[4]|max_length[30]|alpha');
        $this->form_validation->set_rules('tipo','Tipo','required');
        $this->form_validation->set_rules('cilindrada','Cilindrada','required|max_length[50]');
        $this->form_validation->set_rules('motor','Motor','required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('chasis','Chasis','required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('numeroMovil','Numero de Movil','required|max_length[10]|numeric');
    }

    public function datos()
    {
       $foto = $this->subirImagen();
       if ($foto=='sinfoto.jpg') {
            if ($this->input->post('archivo1')!='sinfoto.jpg') {
                if ($this->input->post('archivo1')=='') {
                    $foto = 'sinfoto.jpg';  
                }else{
                    $foto = $this->input->post('archivo1');    
                }                
            }
        }
        echo $foto;
        $params = array(
           'idSocio' => $this->input->post('socio'),
           'idTipoVehiculo' => $this->input->post('tipo'),
           'placa' => $this->input->post('placa'),
           'marca' => $this->input->post('marca'),
           'color' => $this->input->post('color'),
           'modelo' => $this->input->post('modelo'),
           'cilindrada' => $this->input->post('cilindrada'),
           'motor' => $this->input->post('motor'),
           'chasis' => $this->input->post('chasis'),
           'numeroMovil' => $this->input->post('numeroMovil'),
           'fotoVehiculo' => $foto,
        );

        return $params;
    }

    public function subirImagen(){
        $config['upload_path'] = './fotos/vehiculos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("archivo")) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            //return;
            return "sinfoto.jpg";
        } else {

            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            $data['imagen'] = $imagen;
            
            return $imagen;
        }
    }

    public function address($str)
    {

        if (preg_match('/^[A-Z0-9áéíóú.# ]+$/i', $str))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('address', 'El campo {field} solo puede contener caracteres alfabéticos . y/o #  .');
            return FALSE;
        }
    }
}

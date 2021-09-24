<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Socio extends CI_Controller{
   
    function __construct()
    {
        parent::__construct();
        $this->load->model('Socio_model');
    } 

    function index()
    {
        $data['socio'] = $this->Socio_model->todosLosSocios();
        
        $this->load->view('layout/header');
        $this->load->view('socio/index',$data);
        $this->load->view('layout/footer');
    }

    function insert()
    {       
        $this->load->view('layout/header');
        $this->load->view('socio/add');
        $this->load->view('layout/footer');
    }

    function add()
    {   
        $this->formValidation();
        if($this->form_validation->run())     
        {   
                $datos = $this->datos();
                $usuario_id = $this->Socio_model->guardarSocio($datos);
                redirect('socio/index');
            
        }
        else
        {            
            $this->load->view('layout/header');
            $this->load->view('socio/add');
            $this->load->view('layout/footer');
        }
    }

    public function modificar($idSocio)
    {
        $data['socio']=$this->Socio_model->obtenerSocio($idSocio);
        $this->load->view('layout/header');
        $this->load->view('socio/editar',$data);
        $this->load->view('layout/footer');    
    }

    function modificarBD()
    {   
        $idSocio = $this->input->post('idSocio');
        $this->formValidation();
        if($this->form_validation->run())     
        {   
                $datos = $this->datos();
                $usuario_id = $this->Socio_model->modificarSocio($idSocio, $datos);
                redirect('socio/index');
            
        }
        else
        {            
            $this->load->view('layout/header');
            $this->load->view('socio/add');
            $this->load->view('layout/footer');
        }
    }
    
    public function eliminarSocio($idSocio)
    {

        $params = array(
            'estado' => 0,
        );

            $this->Socio_model->eliminarSocio($idSocio,$params);
            //redirect(base_url().CPersona,refesh);
            $data['socio'] = $this->Socio_model->todosLosSocios();
            $this->load->view('layout/header');
            $this->load->view('socio/index',$data);
            $this->load->view('layout/footer');
    }

    public function formValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[70]|alpha');
        $this->form_validation->set_rules('primerApellido','Apellido Paterno','required|max_length[60]|alpha');
        $this->form_validation->set_rules('segundoApellido','Apellido Materno','required|max_length[60]|alpha');
        $this->form_validation->set_rules('fechaNacimiento','Fecha de Nacimiento','required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('direccion','Direccion','required|max_length[60]|callback_address');
        $this->form_validation->set_rules('telefono','Telefono','required|max_length[11]|numeric');
        $this->form_validation->set_rules('ingresos','Ingresos','required|max_length[10]|numeric');
    }

    public function datos()
    {
              
        $params = array(
           'nombre' => $this->input->post('nombre'),
           'primerApellido' => $this->input->post('primerApellido'),
           'segundoApellido' => $this->input->post('segundoApellido'),
           'fechaNacimiento' => $this->input->post('fechaNacimiento'),
           'telefono' => $this->input->post('telefono'),
           'direccion' => $this->input->post('direccion'),
           'ingresos' => $this->input->post('ingresos'),
        );

        return $params;
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

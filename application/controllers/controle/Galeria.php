<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('html','form','url','date'));
        $this->load->library(array('form_validation','image_lib','email','upload','funcoes'));
        $this->load->model('model_galeria');
    }

    function index()
    {
    	$where = array('gal_idPai' => NULL);
    	$listagemTotal = $this->model_galeria->listaGalerias($where);
    	// echo "<pre>";
    	// print_r($listagemTotal);
    	// echo "</pre>";

    	$i = 0;
		$list = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		foreach ($listagemTotal as $row)
		{
			$list.=	'	<div class="panel panel-default">';
			$list.= '		<div class="panel-heading" role="tab" id="heading'.$i.'">';
			$list.= '			<h4 class="panel-title">';
			$list.= '				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">';
			$list.= '					'.$row->gal_titulo.'';
			$list.= '				</a>';
			$list.= '			</h4>';
			$list.= '		</div>';
			$list.= '		<div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">';
			$list.= '			<div class="panel-body">';
			$list.= '				'.$row->gal_descricao.'';
			$list.= '				<ul style="margin-left: 20px;">';
			$where2 = array('gal_idPai' => $row->gal_id);
			$listaFilhos = $this->model_galeria->listaGalerias($where2);
			foreach ($listaFilhos as $row2)
			{
				$list.='				<li><a href="#">'.$row2->gal_titulo.'</a></li>';
			}
			$list.= '				</ul>';
			$list.= '			</div>';
			$list.= '		</div>';
			$list.= '	</div>';

			$i++;
		}
		$list.= '</div>';

		$dados = array(
			'titulo' => 'Controle - Galeria',
			'listaGalerias' => $list,
		);

		$this->load->view('controle/galeria_view_controle', $dados);
    }

    function categoria()
    {
		$listagemTotal = $this->model_galeria->listaCategorias();
		// echo "<pre>";
  //   	print_r($listagemTotal);
  //   	echo "</pre>";

		$list = "";
		foreach ($listagemTotal as $row)
		{
			$list.= '<tr>';
			$list.=		'<td>'.$row->cat_titulo.'</td>';
			$list.=		'<td>'.$row->cat_descricao.'</td>';
			$list.=		'<td>';
			$list.=			'<a href="'.base_url("controle/galeria/edita_categoria/$row->cat_id").'" data-toggle="tooltip" data-placement="top" title="Alterar"><img style="margin: 0 5px;" src="'.base_url('dist/img/edit_user.png').'" height="26" width="26" alt="Editar"></a>';
			$list.=			'<a href="'.base_url("controle/galeria/deleta_categoria/$row->cat_id").'" data-toggle="tooltip" data-placement="top" title="Excluir"><img style="margin: 0 5px;" src="'.base_url('dist/img/lixo.png').'" height="26" width="26" alt="Excluir"></a>';
			$list.=		'</td>';
			$list.= '</tr>';
		}

		$dados = array(
			'titulo' => 'Controle - Categoria',
			'listaCategorias' => $list,
			'formCat' => array('id' => 'formCat'),
		);

		$this->load->view('controle/categoria_view_controle', $dados);
    }

    function insereCategoria()
    {
		$cat_titulo = $this->input->post('cat_titulo', TRUE);
		$cat_descricao = $this->input->post('cat_descricao', TRUE);
		$cat_data = mdate("%Y-%m-%d");

		$catInsert = array(
			'cat_titulo' => $cat_titulo,
			'cat_descricao' => $cat_descricao,
			'cat_data' => $cat_data,
		);

		try
		{
			$this->model_galeria->salvaCategoria($catInsert);
			$dados['msg'] = "OK";
		}
		catch(PDOExeception $e)
		{
			$dados['msg'] = "Erro: ".$e->getMessage();
		}

		echo json_encode($dados);
    }
}
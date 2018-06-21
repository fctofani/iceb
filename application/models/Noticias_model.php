<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Noticias_model extends CI_Model {

  // Variáveis de instância da classe notícias - vindo do banco de dados.
  public $id;
  public $titulo;
  public $resumo;
  public $imagem;
  public $link;
  public $data;

	public function __construct(){
		parent::__construct();
	}

  public function noticias_home(){
    $this->db->limit(6);
    $this->db->order_by('data','DSC');
    return $this->db->get('noticias')->result();
  }

  public function listar_noticias(){
    $this->db->order_by('data','DSC');
    return $this->db->get('noticias')->result();
  }

  public function listar_noticia($id){
      $this->db->from('noticias');
      $this->db->where('noticias.id',$id);
      return $this->db->get()->result();
  }

  public function conteudo_noticia($id){
      $this->db->select('noticias.id, noticias.titulo, noticias.resumo, noticias.imagem, noticias.link, noticias.data');
      $this->db->from('noticias');
      $this->db->where('id = '.$id);
      return $this->db->get()->result();
  }

  public function adicionar($titulo, $resumo, $imagem, $link, $data){
      $dados['titulo'] = $titulo;
      $dados['resumo'] = $resumo;
      $dados['imagem'] = $imagem;
      $dados['link'] = $link;
      $dados['data'] = $data;
      return $this->db->insert('noticias',$dados);
  }

  public function remover($id){
      $this->db->where('id',$id);
      return $this->db->delete('noticias');
  }

  public function alterar($id, $titulo, $resumo, $imagem, $link, $data){
      $dados['titulo'] = $titulo;
      $dados['resumo'] = $resumo;
      $dados['imagem'] = $imagem;
      $dados['link'] = $link;
      $dados['data'] = $data;
      $this->db->where('id',$id);
      return $this->db->update('noticias',$dados);
  }
}
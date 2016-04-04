<?php
class menu_dinamico{
	function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }

    function crea_menu($id_usuario,$username,$tipo)
    {
    	$query1 = $this->ci->db->query("select * from permisos_usuarios WHERE id_usuario='$id_usuario'");
    	$query2 = $this->ci->db->query("SELECT p.id,p.id_menu,m.nom_menu,m.id_padre,m.url FROM permisos_usuarios p INNER JOIN menu m ON p.id_menu = m.id_menu WHERE p.id_usuario='$id_usuario' AND p.id_padre IS NULL AND m.vigente=1");
		$query3 = $this->ci->db->query("SELECT p.id,p.id_menu,m.nom_menu,m.id_padre,m.url FROM permisos_usuarios p INNER JOIN menu m ON p.id_menu = m.id_menu WHERE p.id_usuario='$id_usuario' AND m.id_padre IS NOT NULL AND m.vigente=1");
		$query4 = $this->ci->db->query("SELECT p.id,p.id_menu,m.nom_menu,m.id_padre,m.url FROM permisos_menu p INNER JOIN menu m ON p.id_menu = m.id_menu WHERE p.id_tipousuario='$tipo' AND p.id_padre IS NULL AND m.vigente=1");
		$query5 = $this->ci->db->query("SELECT p.id,p.id_menu,m.nom_menu,m.id_padre,m.url FROM permisos_menu p INNER JOIN menu m ON p.id_menu = m.id_menu WHERE p.id_tipousuario='$tipo' AND m.id_padre IS NOT NULL AND m.vigente=1");

		if(empty($username))
		{
			redirect(base_url().'login/logout', 'refresh');
		}
		else
		{
			$existe_permisos_usuario=$query1->result();
			if($existe_permisos_usuario)
			{
				$menu['lista_menu']=$query2->result();
				$menu['lista_submenu']=$query3->result();
			}
			else
			{
				$menu['lista_menu']=$query4->result();
				$menu['lista_submenu']=$query5->result();
			}

			return $menu;
    	}
    }
}

?>
<?php
interface LogoSQL
{
	
	public const SQL_LISTE_LOGOS = "SELECT * FROM logos";
	public const SQL_DETAIL_LOGO = "SELECT * FROM logos WHERE id = :id"; 

}
?>
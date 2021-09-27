<?php
interface LogoSQL
{
	
	public const SQL_LISTE_LOGOS = "SELECT * FROM logo";
	public const SQL_DETAIL_LOGO = "SELECT * FROM logo WHERE id = :id"; 
	public const SQL_NOUVEAUTES_LOGOS = "SELECT * FROM logo LIMIT 3";

}
?>
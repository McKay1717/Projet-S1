<?php
function HashPassword($mdp)
{
	return hash("sha256",hash("md5", $mdp));
}
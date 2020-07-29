<?php

namespace Projeto\APRJ\Services;

use Projeto\APRJ\Services\ServiceTraitFilter;


trait ServiceTraitLimpaPost
{
	use ServiceTraitFilter;

	public function limpaPost(array $post){

		// $postLimpo = array_filter($post, function ($valor) {

		// 	switch (gettype($valor)) {
		// 	case 'string':
		// 	$campo = $this->filtraString($valor);
		// 		break;
		// }


		// });

		return $post;
		}
}

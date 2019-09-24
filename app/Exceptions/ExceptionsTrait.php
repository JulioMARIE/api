<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 */
trait ExceptionTrait
{

  function apiException($request, $e)
  {
    if ($this->isModel($e)) {
      return $this->ModelResponse($e);
    }
    if ($this->isHttp($e)) {
      return $this->HttpResponse($e);
    }
    return parent::render($request, $e);
  }

  public function isModel($e)
  {
      return $e instanceof ModelNotFoundException;
  }

  public function isHttp($e)
  {
      return $e instanceof NotFoundHttpException;
  }

  public function ModelResponse($e)
  {
    return response( [
      'errors' => 'Product Model Not Found'
    ], Response::HTTP_NOT_FOUND);
  }

  public function HttpResponse($e)
  {
    return response( [
      'errors' => 'Incorrect route'
    ], Response::HTTP_NOT_FOUND);
  }

}

?>

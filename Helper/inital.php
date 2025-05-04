<?php
try {

  session_start();
  include_once 'config.php';
  include_once 'database_tools/base_model.php';
  include_once 'Models/user.php';
  include_once 'Models/product.php';
  include_once 'methods/requset.php';
  include_once 'methods/methods.php';
  include_once 'Helper/validations/validations.php';
  include_once 'Middlewares/auth.php';
  include_once 'Helper/database_tools/seeder.php';

  seeder(User::class, function ($i) {
    return [
      'username' => "omar" . rand(100, 999),
      'email' => 'example' . rand(100, 999) . '@gmail.com',
      'role' => "user"
    ];
  }, $for = 10);

  seeder(Product::class, function ($i) {
    $products = [
      [
        'product_name' => 'berry',
        'image' => 'products/berry.png',
        'price' => random_float(1.0, 10.4),
        'description' => 'good',

      ],
      [
        'product_name' => 'lemon',
        'image' => 'products/lemon.png',
        'price' => random_float(1.0, 10.4),
        'description' => 'very good',

      ],
      [
        'product_name' => 'strawberry',
        'image' => 'products/strawberry.png',
        'price' => random_float(1.0, 10.4),
        'description' => 'good',

      ],

    ];
    return $products[$i];
  }, $for = 2);
} catch (Exception $e) {
  $error = [
    "message" => $e->getMessage(),
    'code' => $e->getCode(),
    'file' => $e->getFile(),
    "line" => $e->getLine(),
  ];
  go("error", ["errors" => urlencode(json_encode($error))], false);
}

function powered_by_alert()
{
  $html = <<< h
<div class="modal fade" id="powered_by_alert" tabindex="-1" aria-labelledby="powered_by_alertLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> 
    <div class="modal-content rounded-4 shadow-lg">
      
      <div class="modal-header border-0">
        <h5 class="modal-title fs-5" id="powered_by_alertLabel">Omar Saiouf</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body text-center">
       
        <div class="d-flex justify-content-center gap-3">
          
          <a href="https://github.com/OmarSaiouf" target="_blank" class="text-dark fs-4" title="GitHub">
            <i class="bi bi-github"></i>
          </a>
         
          <a href="https://www.linkedin.com/in/omar-saiouf" target="_blank" class="text-primary fs-4" title="LinkedIn">
            <i class="bi bi-linkedin"></i>
          </a>
          
          <a href="https://t.me/OmarProgrammers" target="_blank" class="text-info fs-4" title="Telegram">
            <i class="bi bi-telegram"></i>
          </a>
        </div>
      </div>
      
      
    </div>
  </div>
</div>
h;
  echo $html;
}
powered_by_alert();

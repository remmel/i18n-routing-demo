

`symfony server:start`  
run localhost:8000/contact



# Generate that project from scratch
```shell script
composer create-project symfony:^4.4 i18n-routing-demo
cd i18n-routing-demo
composer req annotations
cat << EOF >> src/Controller/LuckyController.php
use Symfony\Component\Routing\Annotation\Route;
      
class ContactController
{
/**
 * @Route("/contact")
 */
 public function contact() {
       
 }
EOF
composer require symfony/translation
```
Add in `services.yaml`
```yaml
parameters:
    locale: 'en'
```

`composer req i18` 


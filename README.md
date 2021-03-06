Demo project using [i18n-routing-bundle](https://github.com/remmel/i18n-routing-bundle)

# Generate that project from scratch

## Install basic Symfony app with annotations / translation / twig
```shell script
composer create-project symfony/skeleton:^5.0 i18n-routing-demo
cd i18n-routing-demo
composer req annotations
composer req symfony/translation  
composer req twig
```
```shell script
cat << EOF >> src/Controller/DefaultController.php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/hi", name="hi_page")
     */
    public function hi() {
        return new Response('hi');
    }
}
EOF
```
`symfony server:start`  
Go to localhost:8000/hi  
`bin/console debug:router`  

## Install i18n-routing-bundle

Add in `services.yaml`
```yaml
parameters:
    locale: "%kernel.default_locale%"
```

Install bundle: `composer req i18n-routing-bundle` 

Add in `config/packages/jms_i18n_routing.yaml`:
```yaml
jms_i18n_routing:
  locales:
    en: //www.website.com
    de: //www.website.de
    fr_BE: //www.website.be/fr
    nl_BE: //www.website.be/nl
```

Add / complete `templates`, `DefaultController` and `translations`.

```shell script
bin/console debug:router
 ------------------------- -------- -------- ----------------- -------------------------- 
  Name                      Method   Scheme   Host              Path                      
 ------------------------- -------- -------- ----------------- -------------------------- 
  _preview_error            ANY      ANY      ANY               /_error/{code}.{_format}  
  homepage__RG__en          ANY      ANY      www.website.com   /                         
  homepage__RG__de          ANY      ANY      www.website.de    /                         
  homepage__RG__fr_BE       ANY      ANY      www.website.be    /fr/                      
  homepage__RG__nl_BE       ANY      ANY      www.website.be    /nl/                      
  contact_page__RG__en      ANY      ANY      www.website.com   /contact                  
  contact_page__RG__de      ANY      ANY      www.website.de    /kontakt                  
  contact_page__RG__fr_BE   ANY      ANY      www.website.be    /fr/nous-contacter        
  contact_page__RG__nl_BE   ANY      ANY      www.website.be    /nl/contacteer-ons        
  not_i18n_page             ANY      ANY      ANY               /not-i18n                 
  hi_page                   ANY      ANY      ANY               /hi                       
 ------------------------- -------- -------- ----------------- -------------------------- 

```

Configure local hosts, to be able to check in local
`sudo nano /etc/hosts`  
`127.0.0.1  www.website.com www.website.de www.website.be`

Go in http://www.website.com

## In order to custom bundle and use local package

- `composer require remmel/i18n-routing-bundle @dev`  
or
- remove manually remmel/i18n-routing-bundle folder
- `composer update remmel/i18n-routing-bundle`
```yml
"repositories": [
    {
        "type": "path",
        "url": "/home/remmel/workspace/JMSI18nRoutingBundle",
        "options": {
            "symlink": true
        }
    }
],
```

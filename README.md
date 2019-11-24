# Generic Repository
Generic repository for Doctrine ORM. It returns Collection instead of simple arrays and add a `save()` method to 
preserve the Repository pattern.

It requires that you install Doctrine in your application to work. If you want built-in Doctrine, you can use the 
[orm-pack](https://github.com/johnkrovitch/orm-pack).

# Installation

```bash
composer require johnkrovitch/repository
```

# Usage

```php
<?php

namespace App\Repository;

use App\Entity\Article;
use JK\Repository\AbstractRepository;
use Doctrine\Common\Collections\Collection;

class ArticleRepository extends AbstractRepository
{    
    public function getEntityClass(): string
    {
        return Article::class;
    }
}
```

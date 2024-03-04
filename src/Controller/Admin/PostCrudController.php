<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $imageField = ImageField::new('image')->setBasePath('/build/assets/posts')->setUploadDir('public/build/assets/posts')->setUploadedFileNamePattern('[slug]-[contenthash].[extension]');

        $fields = [
            TextField::new('title'),
            TextField::new('subtitle'),
            TextEditorField::new('text'),
            DateTimeField::new('created_at'),
        ];

        if ($pageName == Crud::PAGE_NEW || $pageName == Crud::PAGE_EDIT) {
            $fields[] = $imageField;
        }
        $fields[] = $imageField;

        return $fields;
    }
}

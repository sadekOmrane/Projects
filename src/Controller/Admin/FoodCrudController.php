<?php

namespace App\Controller\Admin;

use App\Entity\Food;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FoodCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Food::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            MoneyField::new('price')->setCurrency('TND'),
            AssociationField::new('category'),
            //TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            //ImageField::new('imageFile')->setBasePath($this->getParameter("app.path.product_images"))->onlyOnIndex(),

            TextareaField::new('imageFile', 'update you image')->setFormType(VichImageType::class)->hideOnIndex(),

            ImageField::new('image', "Food image")->setBasePath('/uploads/images/products/')->setUploadDir('/public/uploads/images/products/')->setUploadedFileNamePattern('[randomhash],[extension]')->setRequired(false)->onlyOnIndex(),

            TextEditorField::new('description'),

        ];
    }
}

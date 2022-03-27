<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;



class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Name'),
            EmailField::new('Email'),
            TextField::new('Password')->hideOnIndex(),
            ArrayField::new('Roles'),
            NumberField::new('Cin'),
            TelephoneField::new('Phone')
        ];
    }
}

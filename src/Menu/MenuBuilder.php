<?php



namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'home']);
        $menu->addChild('Vols disponibles', ['route'=>'app_vol_index']);
        $menu->addChild('Villes desservies', ['route'=>'app_ville_index']);

        return $menu;
    }
}
 ?>
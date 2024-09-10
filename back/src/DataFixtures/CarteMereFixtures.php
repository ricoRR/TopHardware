<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CarteMereFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $productsData = [
            [
                'type' => 'Carte Mère',
    'name' => 'MSI PRO B760-P WIFI DDR4',
    'stripeid'=>'prod_Qm9iEn3jE5cRbc',  
    'price' => 146.99,
    'description' => 'Carte mère ATX - Socket 1700 - Chipset Intel B760 - USB 3.1 - M.2 PCIe 4.0 - WiFi 6E / Bluetooth',
    'caractéristique' => 'Processeur: Intel® Core™ i9 / i7 / i5 / i3 / Pentium® / Celeron® de 14ème, 13ème et 12ème génération (Raptor Lake / Refresh et Alder Lake), Chipset: Intel® B760, Socket: LGA 1700, Mémoire: DDR4, jusqu\'à 128 Go, fréquence de base max 3200 MHz, fréquence XMP max 5333 MHz',
    'photo' => [
        'https://media.topachat.com/media/s400/63e1175135275f16ea4887d3.jpg',
        'https://media.topachat.com/media/s100/63e1175935275f16ea48880c.jpg',
        'https://media.topachat.com/media/s100/63e1175b4fff394d936ab2cd.jpg',
        'https://media.topachat.com/media/s100/63e1175a06ff811a436c2d93.jpg',
        'https://media.topachat.com/media/s100/63e1175a158d8a7ff578dd88.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/63e1175135275f16ea4887d3.jpg',
    'details' => 'Exploitez la pleine puissance de Raptor Lake. La carte mère MAG B760-P WIFI DDR4 est le socle idéal pour fonder votre configuration basée sur un processeur Intel Raptor Lake. Sa conception intègre le chipset Intel B760 et un socket LGA 1700. Cette carte mère au format ATX offre des fonctionnalités de pointe pour faire décoller les performances de votre PC.',
    'amount' => 1,
    'reduction' =>10,
    'views'=>0,
    'highlight' => [
        'Exploitez la pleine puissance de Raptor Lake',
        'Support de la mémoire DDR4 3200 MHz',
        'Connecteurs RGB et RGB adressables',
        'Multiples connecteurs PCI-Express',
        'Compatible avec les SSD de dernière génération'
    ]
            ],
            [
               'type' => 'Carte Mère',
    'name' => 'MSI PRO H610M-E DDR4',
    'price' => 69.99,
    'stripeid'=>'prod_Qm9j1ZmFT1cV9D',  

    'description' => 'Carte mère Micro ATX - Socket 1700 - Chipset Intel H610 - USB 3.0 - M.2 PCIe 3.0',
    'caractéristique' => 'Processeur: Intel® Core™ i9 / i7 / i5 / i3 / Pentium® / Celeron® de 12ème et 13ème génération (Alder Lake-S - Raptor Lake), Chipset: Intel® H610, Socket: LGA 1700, Mémoire: 2 x DIMM DDR4 3200 MHz (jusqu\'à 64 Go), Stockage: 1 x M.2 PCIe 3.0 x4, 4 x SATA III 6 Gb/s',
    'photo' => [
        'https://media.topachat.com/media/s400/640f3c06f59d1f18eb7ae312.jpg',
        'https://media.topachat.com/media/s100/640f3c0c846e097afe5b641f.jpg',
        'https://media.topachat.com/media/s100/640f3c0c7c73946ad61b5222.jpg',
        'https://media.topachat.com/media/s100/640f3c0ce25d1d2a9f769a6f.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/640f3c06f59d1f18eb7ae312.jpg',
    'details' => 'La carte mère MSI PRO H610M-E est le socle idéal pour fonder votre configuration basée sur un processeur Intel Alder Lake et Raptor Lake (12ème et 13ème génération). Sa conception intègre le chipset Intel H610 et un socket LGA 1700. Cette carte mère au format mATX offre des fonctionnalités de pointe pour faire décoller les performances de votre PC : 1 port PCI-Express 16x renforcé, 1 port M.2 compatible NVMe en PCI-E 3.0, un processeur audio Realtek ALC897, un contrôleur Ethernet puissant Realtek RTL8111H 1 Gbps.',
    'amount' => 1,
    'reduction' =>20,
    'views'=>0,
    'highlight' => [
        'Exploitez la pleine puissance d\'Alder Lake et Raptor Lake',
        'Support de la mémoire DDR4 3200 MHz',
        'Compatible avec les SSD nouvelle génération',
        'Configuration nouvelle génération',
        'Audio précis et puissant'
    ]
            ],
            [
                'type' => 'Carte Mère',
    'name' => 'ASUS TUF GAMING B760-PLUS WIFI DDR4',
    'price' => 166.99,
    'stripeid'=>'prod_Qm9kcmEf1d54bF',  
    'description' => 'Carte mère ATX - Socket 1700 - Chipset Intel B760 - USB 3.2 - M.2 PCIe 4.0 - WiFi 6E / Bluetooth',
    'caractéristique' => 'Processeur: Intel® Core™ i9 / i7 / i5 / i3 / Pentium® / Celeron® de 13ème et 12ème génération (Raptor Lake et Alder Lake), Chipset: Intel® B760, Socket: LGA 1700, Mémoire: 4 x DIMM, Max. 128GB, DDR4 jusqu\'à 5333 MHz (OC), Stockage: 3 x M.2 Socket, 4 x SATA III 6 Gb/s',
    'photo' => [
        'https://media.topachat.com/media/s400/6399e98f22d2b410ff3ba2c3.jpg',
        'https://media.topachat.com/media/s100/6399e99522d2b410ff3ba2f3.jpg',
        'https://media.topachat.com/media/s100/6399e99607043348770ba4dd.jpg',
        'https://media.topachat.com/media/s100/6399e99590a547510d0c5e3d.jpg',
        'https://media.topachat.com/media/s100/6399e9956575904e280f767e.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/6399e98f22d2b410ff3ba2c3.jpg',
    'details' => 'La carte mère Asus TUF B760-PLUS WIFI DDR4 est le socle idéal pour fonder votre configuration basée sur un processeur Intel Raptor Lake. Sa conception intègre le chipset Intel B760 et un socket LGA 1700. Cette carte mère au format ATX offre des fonctionnalités de pointe pour faire décoller les performances de votre PC : 2 ports PCI-Express 16x (dont un renforcé), 2 ports M.2 compatibles NVMe, processeur audio Realtek HD Audio 7.1, un contrôleur Realtek 2.5Gb et une carte Intel WiFi 6E compatible WiFi ax et Bluetooth 5.2 pour une connexion irréprochable.',
    'amount' => 1,
    'reduction' =>30,
    'views'=>0,
    'highlight' => [
        'Exploitez la pleine puissance de Raptor Lake',
        'Support de la mémoire DDR4 3200 MHz (et jusqu\'à 5333 MHz en XMP)',
        'Éclairage Aura RGB',
        'Multipliez les cartes graphiques',
        'Compatible avec les SSD de dernière génération'
    ]
            ],
            [
                'type' => 'Carte Mère',
    'name' => 'GIGABYTE B760 GAMING X AX DDR4',
    'price' => 175.99,
    'stripeid'=>'prod_Qm9lO9cnFqGByS',  

    'description' => 'Carte mère ATX - Socket 1700 - Chipset Intel B760 - USB 3.1 - M.2 PCIe 4.0 - WiFi 6E / Bluetooth',
    'caractéristique' => 'Processeur: Intel® Core™ i9 / i7 / i5 / i3 / Pentium® / Celeron® de 12ème, 13ème et 14ème génération (Alder Lake-S et Raptor Lake / Refresh), Chipset: Intel® B760, Socket: LGA 1700, Mémoire: 4 x DIMM, Max. 128GB, DDR4 jusqu\'à 5333 MHz (O.C.), Stockage: 3 x M2 Socket Type 2280/22110 PCIe 4.0 x4 (Compatible NVMe), 4 x SATA III 6 Gb/s',
    'photo' => [
        'https://media.topachat.com/media/s400/63bc2729bb19f12a6715054b.jpg',
        'https://media.topachat.com/media/s100/63bc273185e56b03a6245b6d.jpg',
        'https://media.topachat.com/media/s100/63bc2732f13767088e7254ef.jpg',
        'https://media.topachat.com/media/s100/63bc27314834777b1953ff28.jpg',
        'https://media.topachat.com/media/s100/63bc2731bb19f12a67150587.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/63bc2729bb19f12a6715054b.jpg',
    'details' => 'La carte mère Gigabyte B760 GAMING X est le socle idéal pour fonder votre configuration basée sur un processeur Raptor Lake. Sa conception intègre le chipset Intel B760 et un socket LGA 1700. Cette carte mère au format ATX offre des fonctionnalités de pointe pour faire décoller les performances de votre PC : 3 ports PCI-Express 16x (dont 1 renforcé), 3 ports M.2 compatibles NVMe, processeur audio Realtek ALC897 HD Audio 7.1, un contrôleur Realtek RTL8125 2.5 Gbps et une puce Wifi Intel Wi-Fi 6E AX211 pour une connexion irréprochable.',
    'amount' => 1,
    'reduction' =>40,
    'views'=>0,
    'highlight' => [
        'Exploitez la pleine puissance de Raptor Lake',
        'Support de la mémoire DDR4 3200 MHz (et jusqu\'à 5333MHz en XMP)',
        'Éclairage RGB Fusion',
        'Multipliez les cartes d\'extension',
        'Compatible avec les SSD de dernière génération'
    ]
            ],
        
        ];

        $categorieCarteMere = new Categorie();
        $categorieCarteMere->setName('Carte Mere');
        $manager->persist($categorieCarteMere);

        foreach ($productsData as $productData) {
            $product = new Composant();
            $product->setType($productData['type']);
            $product->setName($productData['name']);
            $product->setPrice($productData['price']);
            $product->setDescription($productData['description']);
            $product->setCaractéristique($productData['caractéristique']);
            $product->setPhoto($productData['photo']);
            $product->setPp($productData['pp']);
            $product->setDetails($productData['details']);
            $product->setHightlight($productData['highlight']);
            $product->setReduction($productData['reduction']);
            $product->setAmount($productData['amount']);
            $product->setStripeId($productData['stripeid']);
            $product->setCategorie($categorieCarteMere);


            $manager->persist($product);
        }

        $manager->flush();
    }
}
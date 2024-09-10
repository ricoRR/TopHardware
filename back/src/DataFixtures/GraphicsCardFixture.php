<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class GraphicsCardFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cardsData = 
            [
                [
                    'type' => 'Carte graphique',
    'name' => 'MSI GeForce GT 1030 2GHD4 LP OC',
    'stripeid'=>'prod_Qm9nOBorRvpRYO',
    'price' => 89.99,
    'description' => 'Carte graphique Low-Profile overclockée - Refroidissement passif - 2 Go GDDR4',
    'caractéristique' => 'GeForce GT 1030, 2 Go GDDR4, PCI Express 3.0, Fréquence Base : 1 189 MHz, Boost : 1 430 MHz, Mémoire 2 100 MHz, Interface 64 bits, 384 cœurs CUDA',
    'photo' => [
        'https://media.topachat.com/media/s100/619fa6522cd9fe16f23bcec2.jpg',
        'https://media.topachat.com/media/s100/619fa651ce5de428736406ad.jpg',
        'https://media.topachat.com/media/s100/619fa6522572885fae33057f.jpg',
        'https://media.topachat.com/media/s100/619fa651a2cec2241f8758dd.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/619e503059095463b3523085.jpg',
    'details' => 'Moteur graphique GeForce GT 1030, Architecture Pascal, Bus PCI Express 3.0, Mémoire 2 Go GDDR4, Fréquence d\'horloge Base : 1 189 MHz, Boost : 1 430 MHz, Fréquence mémoire 2 100 MHz, Interface mémoire 64 bits, Finesse de gravure 14 nm, Cœurs CUDA 384, Sorties 1 x DisplayPort, 1 x HDMI 2.0, Dimensions 150 x 69 x 38 mm',
    'amount' => 10, 
    'reduction' =>10,
    'views'=>0,
    'highlight' => [
        'GeForce Experience™ pour l\'optimisation des jeux et la mise à jour des pilotes',
        'Mode d\'anti-aliasing NVIDIA FXAA™ pour un affichage lisse',
        'NVIDIA® PureVideo® HD pour un décodage vidéo haute définition',
        'Support audio TrueHD et DTS-HD'
    ]
                ],
                [
                   'type' => 'Carte graphique',
    'name' => 'Asus GeForce RTX 3060 DUAL O12G V2 (12 Go) (LHR)',
    'price' => 319.99,
    'stripeid'=>'prod_Qm9oTSPogf7QKT',
    'description' => 'Carte graphique overclockée - Refroidissement semi-passif (mode 0 dB) - 12 Go GDDR6',
    'caractéristique' => 'GeForce RTX 3060, Architecture Ampere, 12 Go GDDR6, PCI Express 4.0, Fréquence Boost : 1807 MHz (OC Mode), Mémoire 15 Gbps, Interface 192 bit, 3584 cœurs CUDA',
    'photo' => [
        'https://media.topachat.com/media/s100/619f9af859095463b353c441.jpg',
        'https://media.topachat.com/media/s100/619f9af9a5c58356de79f680.jpg',
        'https://media.topachat.com/media/s100/619f9af9ce5de42873635dd4.jpg',
        'https://media.topachat.com/media/s100/619f9af82572885fae3261a5.jpg',
        'https://media.topachat.com/media/s100/619f9afa59095463b353c488.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/619e4497a2cec2241f850996.jpg',
    'details' => 'Architecture Ampere, Bus PCI Express 4.0, Mémoire 12 Go GDDR6, Fréquence Boost : 1807 MHz (OC Mode), Bande passante mémoire 15 Gbps, Interface mémoire 192 bit, Finesse de gravure 8 nm, 3584 cœurs CUDA, 112 Tensor Cores, 28 RT Cores, Sorties : 3 x DisplayPort 1.4a, 1 x HDMI 2.1, Alimentation recommandée 650 W, Dimensions : 200 x 123 x 38 mm',
    'amount' => 200, 
    'reduction' =>0,
    'views'=>0,
    'highlight' => [
        'Architecture Ampere avec ray tracing et DLSS',
        'Overclockée d\'usine',
        'Refroidissement semi-passif (mode 0 dB)',
        'Backplate métallique pour rigidité et dissipation',
        'Technologie RTX IO pour des chargements plus rapides',
        'Compatible DirectX 12 Ultimate et PCI-Express 4.0'
    ]
                ],
                [
                    'type' => 'Carte graphique',
                    'name' => 'Gigabyte Radeon RX 7800 XT GAMING OC',
                    'price' => 559.99,
                    'stripeid'=>'prod_Qm9pKdCJg4ZcTt',  
                    'description' => 'Carte graphique overclockée - Refroidissement semi-passif (mode 0 dB) - 16 Go GDDR6',
                    'caractéristique' => 'Radeon RX 7800 XT, Architecture RDNA3, 16 Go GDDR6, PCI Express 4.0, Fréquence Boost : 2565 MHz, Mémoire 19.5 Gbps, Interface 256 bit, 3840 processeurs de flux',
                    'photo' => [
                        'https://media.topachat.com/media/s100/64f6dcdcc372c85e0908a27a.jpg',
                        'https://media.topachat.com/media/s100/64f6dcdc9dec6d56fa0cd4ba.jpg',
                        'https://media.topachat.com/media/s100/64f6dcde6b9eb7672769da9a.jpg',
                        'https://media.topachat.com/media/s100/64f6de884c2e8961ec1885a3.jpg',
                        'https://media.topachat.com/media/s100/64f6dce1fba691351748d408.jpg',
                        'https://media.topachat.com/media/s100/64f6dce049adc01ad5493b1b.jpg'
                    ],
                    'pp' => 'https://media.topachat.com/media/s400/64f6de7c67a747241008b587.jpg',
                    'details' => 'Architecture RDNA3, Bus PCI Express 4.0, Mémoire 16 Go GDDR6, Fréquence Base : 1800 MHz, Game : 2254 MHz, Boost : 2565 MHz, Bande passante mémoire 19.5 Gbps, Interface mémoire 256 bit, Finesse de gravure 5 nm, 3840 processeurs de flux, 60 unités de calcul, 240 unités de texture, 96 ROP, Sorties : 2 x DisplayPort 2.1, 2 x HDMI 2.1, Alimentation recommandée 700W, Dimensions : 302 x 130 x 56 mm (2.5 slots)',
                    'amount' => 30,
                    'reduction' =>10,
                    'views'=>0,
                    'highlight' => [
                        'Support natif du raytracing',
                        'Technologie AMD Smart Access Memory',
                        'Technologie AMD FreeSync',
                        'FidelityFX Super Resolution pour booster la fluidité',
                        'Refroidissement à triple ventilateurs',
                        'Ventilation semi-passive (mode 0 dB)',
                        'Backplate métallique pour rigidité et dissipation'
                    ]
                ],
                [
                   'type' => 'Carte graphique',
    'name' => 'Gigabyte GeForce RTX 4070 SUPER GAMING OC',
    'price' => 729.99,
    'stripeid'=>'prod_Qm9qA4tr4gcJNr',  
    'description' => 'Carte graphique overclockée - Refroidissement semi-passif (mode 0 dB) - 12 Go GDDR6X',
    'caractéristique' => 'GeForce RTX 4070 SUPER, Architecture Ada Lovelace, 12 Go GDDR6X, PCI Express 4.0, Fréquence Boost : 2565 MHz, Mémoire 21 Gbps, Interface 192 bit, 7168 coeurs CUDA',
    'photo' => [
        'https://media.topachat.com/media/s100/659beeeb93fa27097d1af4c3.jpg',
        'https://media.topachat.com/media/s100/659beeeb5b28e25081368027.jpg',
        'https://media.topachat.com/media/s100/659beeecf21a8d02c3186c2f.jpg',
        'https://media.topachat.com/media/s100/659beeed9c3e785da91a1dc6.jpg',
        'https://media.topachat.com/media/s100/659beeef493efb46f74030a5.jpg',
        'https://media.topachat.com/media/s100/659beeed3e97c062b74149b7.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/659beee2fe06b4238a16c68c.jpg',
    'details' => 'Architecture Ada Lovelace, Bus PCI Express 4.0, Mémoire 12 Go GDDR6X, Fréquence Base : 1980 MHz, Boost : 2565 MHz, Bande passante mémoire 21 Gbps, Interface mémoire 192 bit, Finesse de gravure 4 nm, 7168 coeurs CUDA, 224 Tensor Cores, 56 RT Cores, Sorties : 3 x DisplayPort 1.4a, 1 x HDMI 2.1, Alimentation recommandée 700W, Dimensions : 300 x 130 x 57.6 mm (3 slot)',
    'amount' => 10,
    'reduction' =>15, 
    'views'=>0,
    'highlight' => [
        'Architecture Ada Lovelace avec support du ray tracing',
        'DLSS 3.0 pour une fluidité améliorée',
        'Technologie RTX IO pour des chargements plus rapides',
        'Refroidissement à triple ventilateur de 90 mm',
        'Ventilation semi-passive (mode 0 dB)',
        'Backplate métallique pour rigidité et dissipation',
        'Éclairage RGB adressable',
        'Double BIOS Performance/Silence'
    ]
                ]
        ];

        
        $categorieCarteGraphique= new Categorie();
        $categorieCarteGraphique->setName('Carte Graphique');
        $manager->persist($categorieCarteGraphique);

        foreach ($cardsData as $cardData) {
            $card = new Composant();
            $card->setType($cardData['type']);
            $card->setName($cardData['name']);
            $card->setPrice($cardData['price']);
            $card->setDescription($cardData['description']);
            $card->setCaractéristique($cardData['caractéristique']);
            $card->setPhoto($cardData['photo']);
            $card->setPp($cardData['pp']);
            $card->setDetails($cardData['details']);
            $card->setHightlight($cardData['highlight']); 
            $card->setReduction($cardData['reduction']); 
            $card->setAmount($cardData['amount']);
            $card->setStripeId($cardData['stripeid']);
            $card->setCategorie($categorieCarteGraphique);

            $manager->persist($card);
        }

        $manager->flush();
    }
}
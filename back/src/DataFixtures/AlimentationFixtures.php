<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;



class AlimentationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $alimentations = [
            [      
                'type' => "Alimentation PC",
                'reduction' =>10,
    'name' => "be quiet! Pure Power 12 M - 850W",
    'price' => 144.99,
    'stripeid'=>'prod_Qm9VgqSbmdBGMG',  
    'description' => "Alimentation PC Certifiée 80+ Gold - Modulaire - ATX 3.0",
    'caractéristique' => "Puissance: 850 W \n
Rendement: 80+ Gold  \n
Norme: ATX 3.0  \n
Fiches SATA: 6  \n
Fiches PCI-E (6 + 2 broches): 4  \n
Fiches 12VHPWR (16 broches): 1 x 600W  \n
Autres connecteurs: 1 x CM 20+4 broches, 1 x CPU (12V) 4+4 broches, 1 x CPU (12V) 8 broches, 2 x Molex 4 broches \n
Modularité: Modulaire  \n
Ventilateur: 120 mm  \n
Nombre de rails 12V: 2  \n
Charge maximale: 850W (Rail 1 : 40A, Rail 2 : 36A) \n
Dimensions: 160 x 150 x 86 mm \n",
    'photo' => [
        "https://media.topachat.com/media/s100/63d2403e10a765675e687493.jpg",
        "https://media.topachat.com/media/s100/63d2403ff1e27566b0651392.jpg"
    ],
    'pp' => "https://media.topachat.com/media/s500/63d24035e7222e5241506f31.webp",
    'details' => "La Pure Power 12 M 850 W est conforme à la norme ATX 3.0 et compatible avec les cartes graphiques PCIe 5.0. Elle offre une fiabilité inégalée et les meilleures caractéristiques de sa catégorie. Livrée à la fois avec un câble PCIe 5.0 12VHPWR et des câbles PCIe 6+2, elle bénéficie d'une excellente compatibilité avec les cartes graphiques actuelles et celles de la nouvelle génération. La Pure Power 12 M 850 W propose tout simplement la meilleure alliance de fonctionnalités de sa catégorie.",
    'amount' => 1,
    'views'=>0,
    'highlight' => [
        "Certification 80 PLUS ® Gold (jusqu'à 93,2 %)",
        "Alimentation ATX 3.0 entièrement compatible avec les cartes graphiques PCIe 5.0 et celles équipées de connecteurs 6+2 pin",
        "Ventilateur 120 mm ultra silencieux signé be quiet!",
        "Câbles modulaires assurant un maximum de flexibilité",
        "Un câble PCIe 5.0 12VHPWR 600 W et 4 connecteurs PCIe 6+2 pour les cartes graphiques puissantes",
        "Garantie constructeur de 10 ans"
    ]
            ],
            [
                'type' => "Alimentation PC",
                'reduction' =>30,
    'name' => "MSI MAG A850GL PCIE5 - 850W",
    'price' => 139.99,
    'stripeid'=>'prod_Qm9Ydi7ot0djw8',  

    'description' => "Alimentation PC Certifiée 80+ Gold - Modulaire - ATX 3.0",
    'caractéristique' => "Puissance: 850 W \n
Rendement: 80+ Gold  \n
Fiches SATA: 8  \n
Fiches PCI-E (6+2 broches): 4  \n
Fiches 12VHPWR (16 broches): 1 x 600 watts  \n
Autres connecteurs: 1 x CM 20+4 broches, 2 x CPU (12V) 4+4 broches, 4 x Molex 4 broches, 1 x Lecteur disquette 4 broches \n
Modularité: 100% Modulaire  \n
Ventilateur: 120 mm  \n
Nombre de rails 12V: 1  \n
Charge maximale: 70.5A - 846W  \n
Dimensions: 140 x 150 x 86 mm",
    'photo' => [
        "https://media.topachat.com/media/s100/64b690a5badf1958837c46ad.jpg",
        "https://media.topachat.com/media/s100/64b690a5bea6464dee155f18.jpg",
        "https://media.topachat.com/media/s100/64b6879f055d535dc57df1c5.jpg",
        "https://media.topachat.com/media/s100/64b690a45dc64856eb0aca77.jpg",
        "https://media.topachat.com/media/s100/64b690a431a34664f7743e47.jpg",
        "https://media.topachat.com/media/s100/64b687a068bf24346629bb48.jpg"
    ],
    'pp' => "https://media.topachat.com/media/s500/64b6905b908a7e6cd107d306.webp",
    'details' => "Pensé pour les gamers, les blocs d'alimentation MSI MAG de la série A GL sont robustes et garantissent une alimentation de qualité pour les systèmes les plis exigeants. Compatible avec les normes PCIe 5.0 et ATX 3.0, cette alimentation sera un excellent choix pour les PC équipés d'une carte graphique de dernière génération.",
    'amount' => 1,
    'views'=>0,
    'highlight' => [
        "Compatible ATX 3.0 : Compatible avec les norme PCIe 5.0 et Intel ATX 3.0, cette alimentation supporte une excursion de puissance totale deux fois plus élevée qu'un bloc d'alimentation ATX 2.0, permettant par ailleurs une excursion de puissance pour les cartes graphiques trois plus élevée. Son connecteur 16 broches 12VHPWR coloré permet par ailleurs de vérifier d'un seul coup d'œil le branchement correct du câble.",
        "Certification 80+ Gold : Une efficacité supérieure influence directement les performances d'un PC et sa consommation. La certification 80+ Gold garantit une efficience et une durabilité plus élevée.",
        "Format compact et 100% modulaire : Un format compact permet de faciliter le cable management et garanti un espace suffisant dans le boîtier. Le design totalement modulaire permet d'utiliser uniquement les connecteurs nécessaires.",
        "Ventilateur silencieux : Le roulement hydrodynamique qui équipe le ventilateur de ce bloc d'alimentation assure de très bonnes performances tout en réduisant le niveau de bruit.",
        "Efficacité et protection : Ce bloc d'alimentation est monorail et peut ainsi délivrer une alimentation précise aux composants. Les mécanismes de protections OCP, OTP, OVP, OPP, UVP et SCP garantissent par ailleurs un fonctionnement en toute sécurité."
    ]
            ],
            [
                'type' => 'Alimentation PC',
                'reduction' =>20,
    'name' => 'Fox Spirit HG750 - 750W',
    'stripeid'=>'prod_Qm9aeO4RCuNdSq',  

    'price' => 99.99,
    'description' => 'Alimentation PC Certifiée 80+ Gold - Modulaire - ATX 3.0',
    'caractéristique' => '750 W',
    'photo' => [
        'https://media.topachat.com/media/s400/659411ee40ca6477266d21da.jpg',
        'https://media.topachat.com/media/s100/659411fcf3210a45d62ae9cb.jpg',
        'https://media.topachat.com/media/s100/659411fd8a072b35765744af.jpg',
        'https://media.topachat.com/media/s100/659411fdc8174745e032ca33.jpg',
        'https://media.topachat.com/media/s100/659411fd227d5f503e1e732a.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s500/659411ee40ca6477266d21da.webp',
    'details' => "L'alimentation HG750 est l'alimentation idéale pour les configurations les plus performantes. Répondant à la norme ATX 3.0 et à la certification 80+ Gold garantissant une efficacité énergétique jusqu'à 90% en charge. Cette certification garantit également une excellente efficience ainsi qu'une stabilité accrue du système. Equipée d'un câble PCIe 5.0 12VHPWR, cette alimentation permet d'alimenter sereinement et efficacement les cartes graphiques de dernière génération les plus gourmandes.",
    'amount' => 10, 
    'views'=>0,
    'highlight' => [
        'Certification 80+ Gold',
        'Norme ATX 3.0',
        'Câble PCIe 5.0 12VHPWR',
        'Condensateur principal japonais',
        'Condensateurs taïwanais de haute qualité',
        'Protections électriques (OTT, UVP, OVP, OVP et OPP)',
        'Câbles gainés',
        'Broches en cuivre au niveau des connecteurs',
        'Efficacité énergétique supérieure à 91% à 50% de charge',
        'Garantie de 10 ans',
        'Ventilateur 120 mm PWM',
        '1 rail 12V',
        'Charge maximale: 62.5A - 750W',
        'Dimensions: 150 x 150 x 86 mm'
    ]
            ],
            [
                'type' => "Alimentation PC",
    'name' => "Cooler Master GX II Gold - 750W",
    'price' => 129.99,
    'stripeid'=>'prod_Qm9czwmoCslU7r',  

    'description' => "Alimentation PC Certifiée 80+ Gold - Modulaire - Semi-passive - ATX 3.0",
    'caractéristique' => "Puissance: 750 W  \n
Rendement: 80+ Gold \n
Norme: ATX 3.0  \n
Fiches SATA: 6  \n
Fiches PCI-E (6 + 2 broches): 4  \n
Fiches 12VHPWR (16 broches): 1 x 600 watts  \n
Autres connecteurs: 1 x CM 20+4 broches, 2 x CPU (12V) 4+4 broches, 2 x Molex 4 broches \n
Modularité: Modulaire \n
Ventilateur: 120 mm  \n 
Nombre de rails 12V: 1  \n
Charge maximale: 750W (Rail 1 : 62.5A)  \n
Dimensions: 160 x 150 x 86 mm ", 
    'photo' => [
        "https://media.topachat.com/media/s100/651ec20e7cde39606a5e3d12.jpg",
        "https://media.topachat.com/media/s100/651ec20d969b5626b76cfd5c.jpg",
        "https://media.topachat.com/media/s100/651ec20d2e84a9418413cf23.jpg",
        "https://media.topachat.com/media/s100/651ec20d37e0d81b952547c6.jpg",
        "https://media.topachat.com/media/s100/651ec20da9eef4237d7160a6.jpg",
        "https://media.topachat.com/media/s100/651ec20e6dc2d070d17e2378.jpg"
    ],
    'pp' => "https://media.topachat.com/media/s500/6464987f1826f9607d036df0.webp",
    'details' => "La GX II Gold apporte de nouveaux standards de durabilité et d'efficience à la gamme d'alimentations de Cooler Master tout en répondant à la norme ATX 3.0.",
    'amount' => 1,
    'reduction' =>30,
    'views'=>0,
    'highlight' => [
        "Support ATX 3.0 et connecteur 12VHPWR durable : le câble 16 pins (12VHPWR) PCIe 5.0 coudé permet une plus grand durabilité et évite de plier le câble",
        "Certifiée 80+ Gold : La certification 80+ Gold garantit une très bonne efficacité",
        "Mode zero-RPM : le mode zero-RPM permet au ventilateur de rester à l'arrêt lorsque la charge est faible",
        "Condensateurs japonais de qualité : des composants de qualité assurent des performances thermiques idéale tout en réduisant le bruit et en améliorant la stabilité",
        "Full modulaire : câbles totalement modulaires pour un cable management facilité",
        "Garantie 10 ans"
    ]
            ]
        ];

        $categorieAlimentation = new Categorie();
        $categorieAlimentation->setName('Alimentation');
        $manager->persist($categorieAlimentation);


        foreach ($alimentations as $alimentationData) {
            $alimentation = new Composant();
            $alimentation->setType($alimentationData['type']);
            $alimentation->setName($alimentationData['name']);
            $alimentation->setPrice($alimentationData['price']);
            $alimentation->setDescription($alimentationData['description']);
            $alimentation->setCaractéristique($alimentationData['caractéristique']);
            $alimentation->setPhoto($alimentationData['photo']);
            $alimentation->setPp($alimentationData['pp']);
            $alimentation->setDetails($alimentationData['details']);
            $alimentation->setHightlight($alimentationData['highlight']);
            $alimentation->setReduction($alimentationData['reduction']);
            $alimentation->setAmount($alimentationData['amount']);
            $alimentation->setStripeId($alimentationData['stripeid']);
            $alimentation->setCategorie($categorieAlimentation);

            $manager->persist($alimentation);
        }

        $manager->flush();
    }
}
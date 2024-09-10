<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class BoitierFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $composantsData = [

         [
                'type' => 'Boitier PC',
                'name' => 'Zalman i3 Neo - Noir',
                'price' => 58.99,
                'stripeid'=>'prod_Qm9dSWCPSO60kY',  

                'description' => 'Boitier PC Moyen Tour - ATX / mATX / Mini-ITX - USB 3.0 - Avec fenêtre (pleine taille)',
                'caractéristique' => 'Boîtier Moyen Tour pour carte mère ATX / mATX / Mini-ITX',
                'photo' => [
                    'https://media.topachat.com/media/s400/649d514d328ac62f0f08da5a.jpg',
                    'https://media.topachat.com/media/s100/649d519471acb4560d5232a3.jpg',
                    'https://media.topachat.com/media/s100/649d519433b74d4d9718e361.jpg',
                    'https://media.topachat.com/media/s100/649d5194096855526e154b12.jpg',
                    'https://media.topachat.com/media/s100/649d5194e3985a398b3ce429.jpg'
                ],
                'pp' => 'https://media.topachat.com/media/s400/649d514d328ac62f0f08da5a.jpg',
                'details' => "Le boîtier Zalman i3 Neo Black est conçu pour accueillir une carte mère ATX, mATX ou Mini-ITX avec une carte graphique de 355 mm de long. Ce boîtier moyen tour avec fenêtre en verre trempé sera un achat idéal pour assembler une configuration performante, axée vers le jeu et le multimédia. Pratique, à l'usage, ce boîtier est conçu pour optimiser la dissipation de la chaleur et le silence de fonctionnement.",
                'amount' => 10,
                'reduction' =>30,
                'views'=>0,
                'highlight' => [
                    'Fenêtre latérale en verre trempé',
                    'Dimensions carte graphique : 355 mm',
                    'Dimensions ventirad : 162 mm',
                    'Profondeur de l\'alimentation : 210 mm',
                    'Dissipation de la chaleur efficace avec 4 ventilateurs RGB fixe fournis',
                    '2 filtres à poussières inclus (haut et dessous)',
                    '2 ports USB 3.0 et 1 port USB 2.0 sur le dessus',
                    'Emplacement pour alimentation placé sur le bas du boîtier'
                ]
                ],
            
                [
                   
                    'type' => 'Boitier PC',
                    'name' => 'Corsair 4000D Airflow - Noir',
                    'price' => 99.99,
                    'stripeid'=>'prod_Qm9fEyErtFUycj',  

                    'views'=>0,
                    'description' => 'Boitier PC Moyen Tour - E-ATX / ATX / mATX / Mini-ITX - USB 3.1 Type C - Avec fenêtre (pleine taille)',
                    'caractéristique' => 'Boîtier Moyen Tour',
                    'photo' => [
                        'https://media.topachat.com/media/s400/619e43e82572885fae30ab15.jpg',
                        'https://media.topachat.com/media/s100/619f9e93a5c58356de7a2e59.jpg',
                        'https://media.topachat.com/media/s100/619f9e932572885fae329765.jpg',
                        'https://media.topachat.com/media/s100/619f9e93ce5de4287363974c.jpg',
                        'https://media.topachat.com/media/s100/619f9e932cd9fe16f23b653b.jpg',
                        'https://media.topachat.com/media/s100/619f9e9359095463b353ff30.jpg'
                    ],
                    'pp' => 'https://media.topachat.com/media/s400/619e43e82572885fae30ab15.jpg',
                    'details' => 'Le Corsair 4000D est un boîtier ATX de format moyen tour connecté avec un panneau avant en acier grillagé pour une circulation de l\'air optimale. Installez votre système dans une boîtier robuste et résistant, avec sa vitre en verre trempé mettant en valeur vos composants. Gardez une installation ordonnée grâce au cache de bloc alimentation intégral et aux options de stockage flexibles qui peuvent accueillir jusqu\'à quatre disques. Avec un espace pouvant accueillir jusqu\'à 6 ventilateurs ou trois radiateurs, et des filtres à poussière amovibles pour un système impeccable.',
                    'amount' => 10, 
                    'reduction' =>0,
                    'highlight' => [
                        'Boîtier ATX de format moyen tour',
                        'Panneau avant en acier grillagé pour une circulation de l\'air optimale',
                        'Vitre en verre trempé',
                        'Cache de bloc alimentation intégral',
                        'Peut accueillir jusqu\'à quatre disques',
                        'Espace pour jusqu\'à 6 ventilateurs ou trois radiateurs',
                        'Filtres à poussière amovibles',
                        'Dimensions : 453 x 230 x 466 mm',
                        'Compatible E-ATX / ATX / Micro ATX / Mini-ITX',
                        'Supporte des cartes graphiques jusqu\'à 360 mm',
                        'Supporte des ventirads jusqu\'à 170 mm',
                        'USB 3.1 Type C en façade'
                    ]
                ]
                ,
            [
        'type' => "Boitier PC",
    'name' => "Corsair 3000D Airflow - Noir",
    'price' => 89.99,
    'stripeid'=>'prod_Qm9gG3dGbi9WpT',  

    'description' => "Boitier PC Moyen Tour - ATX / mATX / Mini-ITX - USB 3.0 - Avec fenêtre (pleine taille)",
    'caractéristique' => "Type de châssis: Boîtier Moyen Tour
Dimensions du boîtier (H x L x P): 466 x 230 x 462 mm
Cartes graphiques: Jusqu'à 360 mm
Carte Mère: ATX / Micro-ATX / Mini-ITX
Ventirad: Jusqu'à 170 mm
Alimentation: Max. 220 mm
Emplacements: 3.5' / 2.5': 2 internes
Connectique en façade: 2 x USB 3.0, 1 x prise casque / microphone
Refroidissement: Ventilateurs inclus: Façade : 1 x 120 mm SP120 Elite, Arrière : 1 x 120 mm SP120 Elite
Poids: 7,3 kg Ports d'extension: 7",
    'photo' => [
        "https://media.topachat.com/media/s100/64bf961a11024f4d5800bb03.jpg",
        "https://media.topachat.com/media/s100/64bf961aaaf36350113e4d85.jpg",
        "https://media.topachat.com/media/s100/64bf961a3d3df46c0b4de432.jpg",
        "https://media.topachat.com/media/s100/64bf9620aa554c2d14110d24.jpg",
        "https://media.topachat.com/media/s100/64bf961ba9d0e556f81796a2.jpg",
        "https://media.topachat.com/media/s100/64bf961b7d4c636d34351683.jpg"
    ],
    'pp' => "https://media.topachat.com/media/s400/64bf9610a8c9aa1c726a5082.jpg",
    'details' => "Le Corsair 3000D Airflow est un boîtier moyen-tour pensé pour une circulation d'air optimale et offre une capacité de refroidissement exceptionnelle. Un panneau avant en acier et deux ventilateurs Corsair SP120 Elite garantissent une circulation de l'air optimale au sein du châssis, tandis que le panneau latéral en verre trempé met brillamment en valeur les composants internes.",
    'amount' => 1,
    'reduction' =>10,
    'views'=>0,
    'highlight' => [
        "Potentiel de refroidissement exceptionnel",
        "Paré pour le futur",
        "Paré et équipé"
    ]
        ]];

        $categorieBoitier = new Categorie();
        $categorieBoitier->setName('Boitier');
        $manager->persist($categorieBoitier);

        foreach ($composantsData as $composantData) {
            $composant = new Composant();
            $composant->setType($composantData['type']);
            $composant->setName($composantData['name']);
            $composant->setPrice($composantData['price']);
            $composant->setDescription($composantData['description']);
            $composant->setCaractéristique($composantData['caractéristique']);
            $composant->setPhoto($composantData['photo']);
            $composant->setPp($composantData['pp']);
            $composant->setDetails($composantData['details']);
            $composant->setHightlight($composantData['highlight']);
            $composant->setReduction($composantData['reduction']);
            $composant->setAmount($composantData['amount']);
            $composant->setStripeId($composantData['stripeid']);
            $composant->setCategorie($categorieBoitier);

            $manager->persist($composant);
        }

        $manager->flush();
    }
}
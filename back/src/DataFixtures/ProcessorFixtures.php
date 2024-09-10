<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class ProcessorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $processorsData = [
            [
                'type' => 'Processeur',
    'name' => 'Intel Core i5-14400F (2.5 GHz)',
    'stripeid'=>'prod_Qm9s7Yc6AJDkYZ',
    'price' => 249.99,
    'description' => 'Processeur Socket 1700 - 10 coeurs - Cache 20 Mo - Raptor Lake refresh - Ventirad inclus',
    'caractéristique' => 
        'Architecture Raptor Lake Refresh ,
        Socket LGA 1700 ,
        Fréquence 2.5 GHz (Base), 4.7 GHz (Boost),
        Nombre de coeurs 10 (6 coeurs performance / 4 coeurs efficient),
        Nombre de threads 16 (12 threads performance / 4 threads efficient),
        Mémoire cache 20 Mo,
        TDP 65 Watts,
        TDP Réel 148 Watts,
        Partie graphique intégrée Non,
        Ventirad inclus Oui'
    ,
    'photo' => [
        'https://media.topachat.com/media/s400/659bcf2d9c03b422551afa74.jpg',
        'https://media.topachat.com/media/s100/659bce4810aaba7be428dbb8.jpg',
        'https://media.topachat.com/media/s100/652ce8b4c560943d131b3070.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/659bcf2d9c03b422551afa74.jpg',
    'details' => 'Intel Core i5-14400F (2.5 GHz) - Processeur Socket 1700 - 10 coeurs - Cache 20 Mo - Raptor Lake refresh - Ventirad inclus',
    'amount' => 15, 
    'reduction' =>10,
    'views'=>0,
    'highlight' => [
        'Faites en toujours plus avec votre PC',
        'Support natif de la DDR5 à 4800 MHz',
        'Finesse de gravure Intel 7 (10 nm Enhanced Superfin)',
        '10 coeurs physiques (6 coeurs performance + 4 coeurs efficients)',
        'Compatible avec la mémoire DDR4 et DDR5',
        'Compatible avec la norme PCI-Express 5.0',
        'Technologies Intel® Turbo Boost Max 3.0'
    ]
            ],
            [
                'type' => 'Processeur',
    'name' => 'AMD Ryzen 5 5600X (3.7 GHz)',
    'stripeid'=>'prod_Qm9tfAgkWjwgap',
    'price' => 159.99,
    'views'=>0,
    'description' => 'Processeur Socket AM4 - Hexa Core - Cache 35 Mo - Vermeer - Ventirad inclus',
    'caractéristique' => "Architecture: Vermeer\n" .
                         "Socket: AM4\n" .
                         "Fréquence: 3.7 GHz (Base), 4.6 GHz (Boost)\n" .
                         "Coefficient débloqué: Oui\n" .
                         "Nombre de coeurs: 6\n" .
                         "Nombre de threads: 12\n" .
                         "Mémoire cache: 35 Mo\n" .
                         "Jeux d'instructions: 64 bits\n" .
                         "Prise en charge mémoire: DDR4 : 3200 MHz *\n" .
                         "PCI-Express: 4.0\n" .
                         "Finesse de gravure: 7 nm\n" .
                         "TDP: 65 Watts\n" .
                         "TDP Réel: 80 Watts\n" .
                         "Ventirad inclus: Oui - Wraith Stealth\n" .
                         "Chipsets compatibles: B550, X570 (peut nécessiter une mise à jour du BIOS)",
    'photo' => [
        'https://media.topachat.com/media/s400/619e451159095463b3522cfb.jpg',
        'https://media.topachat.com/media/s100/62d94ea8702ed03b034a3119.jpg',
        'https://media.topachat.com/media/s100/62d94ea79eac676b3d25028b.jpg',
        'https://media.topachat.com/media/s100/619fa8d4ce5de4287364286a.jpg',
        'https://media.topachat.com/media/s100/619f8cbea2cec2241f859f5b.jpg',
        'https://media.topachat.com/media/s100/62fce400dadc071d4a4da63d.jpg',
        'https://media.topachat.com/media/s100/62fce401ac1a1f7f5f4c69b2.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/619e451159095463b3522cfb.jpg',
    'details' => 'AMD Ryzen 5 5600X (3.7 GHz) - Processeur Socket AM4 - Hexa Core - Cache 35 Mo - Vermeer - Ventirad inclus',
    'amount' => 20,
    'reduction' =>20,
    'highlight' => [
        'Architecture entièrement nouvelle et revue en profondeur',
        'Cœurs x86 "Vermeer" de performances élevées et hautement efficaces',
        'Parfait pour du gaming et du multitâche',
        'Gestion de la norme PCI-Express 4.0',
        'Compatible avec les cartes mères B550 et X570',
        'Livré avec un ventirad Wraith Stealth',
        'Ne possède pas de circuit graphique intégré',
        'N\'est pas compatible avec Windows 7/8/8.1'
    ]
            ],
            [
               'type' => 'Processeur',
    'name' => 'AMD Ryzen 5 7500F (3.7 GHz) - Version Bulk',
    'price' => 194.99,
    'stripeid'=>'prod_Qm9uwl79kibfXG',
    'views'=>0,
    'description' => 'Socket AM5 - Hexa Core - Cache 32 Mo - Raphael - Ventirad inclus',
    'caractéristique' => "Architecture: Raphael\n" .
                         "Socket: AM5\n" .
                         "Fréquence: 3.7 GHz (Base), 5.0 GHz (Boost)\n" .
                         "Coefficient débloqué: Oui\n" .
                         "Nombre de coeurs: 6\n" .
                         "Nombre de threads: 12\n" .
                         "Mémoire cache: 32 Mo\n" .
                         "Jeux d'instructions: 64 bits\n" .
                         "Extensions au jeu d'instructions: AES, AMD-V, AVX, AVX2, AVX512, FMA3, MMX(+), SHA, SSE, SSE2, SSE3, SSE4.1, SSE4.2, SSE4A, SSSE3, x86-64\n" .
                         "Prise en charge mémoire: DDR5 : 5200 MHz *, ECC **\n" .
                         "PCI-Express: 5.0\n" .
                         "Finesse de gravure: 5 nm (CPU), 6 nm (I/O die)\n" .
                         "TDP: 65 Watts\n" .
                         "TDP Réel: 80 Watts\n" .
                         "Ventirad inclus: Wraith Stealth\n" .
                         "Chipsets compatibles: X670E, X670, B650E, B650",
    'photo' => [
        'https://media.topachat.com/media/s400/65031e5a6bb42a40215761f7.jpg',
        'https://media.topachat.com/media/s100/626a653eb0bd482bc64947d5.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/65031e5a6bb42a40215761f7.jpg',
    'details' => 'AMD Ryzen 5 7500F (3.7 GHz) - Version Bulk - Socket AM5 - Hexa Core - Cache 32 Mo - Raphael - Ventirad inclus',
    'amount' => 30,
    'reduction' =>10,
    'highlight' => [
        'Cœurs Zen 4 "Raphael" gravés en 5nm',
        'Socket AMD AM5',
        'Compatible avec la mémoire DDR5',
        'Support du PCI-Express 5.0',
        'Technologie AMD EXPO pour l\'overclocking de la mémoire DDR5',
        'Livré sans boîte avec un ventirad Wraith Stealth',
        'Ne possède pas de circuit graphique intégré',
        'Compatible uniquement avec Windows 10 et 11'
    ]
            ],
            [
              'type' => 'Processeur',
    'name' => 'Intel Pentium Gold G6405 (4.1 GHz)',
    'stripeid'=>'prod_Qm9wxBttF9YWVv',
    'price' => 78.99,
    'views'=>0,
    'description' => 'Processeur Socket 1200 - Dual Core - Cache 4 Mo - Comet Lake - Ventirad inclus',
    'caractéristique' => "Architecture: Comet Lake\n" .
                         "Socket: LGA 1200\n" .
                         "Fréquence: 4.1 GHz\n" .
                         "Nombre de coeurs: 2\n" .
                         "Nombre de threads: 4\n" .
                         "Mémoire cache: 4 Mo\n" .
                         "Jeux d'instructions: 64 bits\n" .
                         "Extensions au jeu d'instructions: SSE 4.1/4.2\n" .
                         "Prise en charge mémoire: DDR4 : 2 666 MHz *\n" .
                         "Technologies CPU supportées: Technologie de virtualisation Intel® (VT-x), Technologie de virtualisation Intel® pour les E/S répartis (VT-d), Technologie de virtualization Intel®VT-x avec tables de pagination (Extended Page Tables), Intel® 64, Technologie Intel SpeedStep® améliorée, Technologies de surveillance thermique, Technologie Intel® de protection de l'identité, OS Guard, Instructions AES, Secure Key\n" .
                         "Finesse de gravure: 14 nm\n" .
                         "TDP: 58 Watts\n" .
                         "TDP Réel: 58 Watts\n" .
                         "Partie graphique intégrée: Intel® UHD Graphics 610\n" .
                         "Fréquence du GPU: 1 050 MHz (fréquence dynamique)\n" .
                         "Ventirad inclus: Oui\n" .
                         "Chipsets compatibles: H410, B460, H470, Z490",
    'photo' => [
        'https://media.topachat.com/media/s400/619e400d2572885fae3034cf.jpg',
        'https://media.topachat.com/media/s100/619fa64fce5de4287364069a.jpg'
    ],
    'pp' => 'https://media.topachat.com/media/s400/619e400d2572885fae3034cf.jpg',
    'details' => 'Intel Pentium Gold G6405 (4.1 GHz) - Processeur Socket 1200 - Dual Core - Cache 4 Mo - Comet Lake - Ventirad inclus',
    'amount' => 100,
    'reduction' =>10,
    'highlight' => [
        'Processeur Intel® Pentium® Gold de nouvelle génération',
        'Performances pour le traitement informatique de tous les jours',
        'Traitements multitâches sans effort',
        'Compatible avec la mémoire DDR4',
        'Plus rapide et plus économe',
        'Configuration évolutive et ouverte aux évolutions futures',
        'Non compatible avec les systèmes d\'exploitation Microsoft antérieurs à Windows 10'
    ]
            ]
        ];

        $categorieProcessor = new Categorie();
        $categorieProcessor->setName('Processeur');
        $manager->persist($categorieProcessor);

        foreach ($processorsData as $processorData) {
            $processor = new Composant();
            $processor->setType($processorData['type']);
            $processor->setName($processorData['name']);
            $processor->setPrice($processorData['price']);
            $processor->setDescription($processorData['description']);
            $processor->setCaractéristique($processorData['caractéristique']);
            $processor->setPhoto($processorData['photo']);
            $processor->setPp($processorData['pp']);
            $processor->setDetails($processorData['details']);
            $processor->setHightlight($processorData['highlight']);
            $processor->setReduction($processorData['reduction']); 
            $processor->setAmount($processorData['amount']);
            $processor->setStripeId($processorData['stripeid']);
            $processor->setCategorie($categorieProcessor);

            $manager->persist($processor);
        }

        $manager->flush();
    }
}
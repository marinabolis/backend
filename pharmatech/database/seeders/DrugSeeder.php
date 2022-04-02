<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drugs = [
            [
                'trade_name_ar' => 'زيثرون 500 مجم 5 اقراص',
                'trade_name_en' => 'Xithrone 500mg 5tabs',
                'image' => '1.jpg',
                'description' => ' Azithromycin is indicated for the treatment of the following infections, when caused by microorganisms sensitive to azithromycin: – upper respiratory tract infections: sinusitis, pharyngitis, tonsilitis. -acute otitis media.
            lower respiratory tract infections: acute bronchitis and mild to moderately severe community acquired pneumonia.
            skin and soft tissue infections.',
                'price' => 45,

                'category_id' => 1,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],
            [
                'trade_name_ar' => 'وجمنتين اي اس -600مجم شراب',
                'trade_name_en' => 'Augmentin ES-600 syrup ',
                'image' => '2.jpg',
                'description' => 'Augmentin ES is a prescription medicine used to treat the symptoms of many different bacterial infections such as sinusitis, pneumonia, ear infections, bronchitis, urinary tract infections, and infections of the skin. Augmentin ES may be used alone or with other medications.',
                'price' => 69,

                'category_id' => 1,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],
            [
                'trade_name_ar' => 'كو – تارج 160/12.5  28قرص',
                'trade_name_en' => 'co-targ 160/12.5MG tab',
                'image' => '3.jpg',
                'description' => "It is thiazide diuretic which exerts its action by acting at site-3(central dilating segment of early distal tubule). It binds to Na+Cl- symporter and inhibits Na+Cl- symport at the luminal membrane. It has additional carbonic anhydrase inhibitory actions in proximal tubules.",
                'price' => 168,

                'category_id' => 2,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],
            [
                'trade_name_ar' => 'كونكور 10مج 30 قرص',
                'trade_name_en' => 'concor 10 MG 30 tabs',
                'image' => '4.jpg',
                'description' => "Bisoprolol is a cardio selective beta-1 adrenergic antagonist.It has negative chronotropic and negative inotropic effects on heart. It decreases oxygen consumption; cardiac work and aortic pressure. It decreases central sympathetic out flow and also decreases nor adrenaline and renin releases. The drug decreases BP in hypertensive individuals.",
                'price' => 56.25,

                'category_id' => 2,


                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'
            ],

            [
                'trade_name_ar' => 'اماريل ام 2/500 مجم 30قرص',
                'trade_name_en' => 'Amaryl m 2/500 MG 30 tabs',
                'image' => '5.jpg',
                'description' => "This medication is a sulfonylurea antidiabetic agent, prescribed for type 2 diabetes. It works by causing the pancreas to produce insulin",
                'price' => 45,

                'category_id' => 3,


                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'
            ],

            [
                'trade_name_ar' => 'ستارفيل اكني-  برون كريم 60جم',
                'trade_name_en' => 'Starville acne-prone cream 60 GM',
                'image' => '6.jpg',
                'description' => " Starville Cream, is a convenient treatment formula Acne-prone skin.",
                'price' => 60,

                'category_id' => 4,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],

            [
                'trade_name_ar' => 'نيتروماك ريتارد 2.5مجم 60كبسوله',
                'trade_name_en' => 'NITROMAK RETARD 2.5MG 60 CAPS.',
                'image' => '7.jpg',
                'description' => "Indication For the prevention of angina
                Pharmacodynamics Nitroglycerin, an organic nitrate, is available in many forms as a vasodilator. Nitroglycerin is used in the treatement of angina pectoris and perioperative hypertension, to produce controlled hypotension during surgical procedures, to treat hypertensive emergencies, and to treat congestive heart failure associated with myocardial infarction. ",
                'price' => 42,

                'category_id' => 5,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],

            [
                'trade_name_ar' => 'افالون لعلامات التمدد كريم 70جم',
                'trade_name_en' => ' AVALON STRETCH MARK CREAM 70ML',
                'image' => '8.jpg',
                'description' => "It enhance stretch marks caused by pregnancy and weight loss",
                'price' => 120,

                'category_id' => 4,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],

            [
                'trade_name_ar' => 'جالفز مت 50/1000 30 كبسوله ',
                'trade_name_en' => 'GALVUS MET 50/1000MG 30 TABS',
                'image' => '9.jpg',
                'description' => "It is a biguanide which exerts antidiabetic action. The drug suppresses gluconeogenesis in liver and thus suppresses hepatic glucose output. It enhance insulin mediated glucose disposal in muscle and adipose tissue. It enhance GLUT1 (glucose transporter-1) transport from intracellular site to plasma membrane. It also interferes with respiratory chain in mitochondria and promotes peripheral glucose utilization by increasing anaerobic glycolysis. It inhibits intestinal absorption of glucose, other hexose sugars, amino acids and vitamin B12. It also improves lipid profile in type-2 diabetics.",
                'price' => 180,

                'category_id' => 3,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ],
            [
                'trade_name_ar' => 'كاردكسين 2.5 مجم 40 كبسوله',
                'trade_name_en' => 'CARDIXIN 0.25 MG 40 TABS.',
                'image' => '10.jpg',
                'description' => 'Digoxin is derived from the leaves of a digitalis plant. Digoxin helps make the heart beat stronger and with a more regular rhythm',
                'price' => 11.2,

                'category_id' => 5,

                'production_date' => '2021-09-13',
                'expiry_date' =>'2023-09-13'

            ]
        ];
        DB::table('drugs')->insert($drugs);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class CreateDefaultDatasTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Insert some languages
		$provinces = [
			[
				'name' => 'បន្ទាយមានជ័យ',
				'name_en' => 'Banteay Meanchey',
			],
			[
				'name' => 'បាត់ដំបង',
				'name_en' => 'Battambang',
			],
			[
				'name' => 'កំពង់ចាម',
				'name_en' => 'Kampong Cham',
			],
			[
				'name' => 'កំពង់ឆ្នាំង',
				'name_en' => 'Kampong Chhnang',
			],
			[
				'name' => 'កំពង់ស្ពឺ',
				'name_en' => 'Kampong Speu',
			],
			[
				'name' => 'កំពង់ធំ',
				'name_en' => 'Kampong Thom',
			],
			[
				'name' => 'កំពត',
				'name_en' => 'Kampot',
			],
			[
				'name' => 'កណ្ដាល',
				'name_en' => 'Kandal',
			],
			[
				'name' => 'កោះកុង',
				'name_en' => 'Koh Kong',
			],
			[
				'name' => 'ក្រចេះ',
				'name_en' => 'Kratie',
			],
			[
				'name' => 'មណ្ឌលគិរី',
				'name_en' => 'Mondul Kiri',
			],
			[
				'name' => 'ភ្នំពេញ',
				'name_en' => 'Phnom Penh',
			],
			[
				'name' => 'ព្រះវិហារ',
				'name_en' => 'Preah Vihear',
			],
			[
				'name' => 'ព្រៃវែង',
				'name_en' => 'Prey Veng',
			],
			[
				'name' => 'ពោធិ៍សាត់',
				'name_en' => 'Pursat',
			],
			[
				'name' => 'រតនគិរី',
				'name_en' => 'Ratanak',
			],
			[
				'name' => 'សៀមរាប',
				'name_en' => 'Siemreap',
			],
			[
				'name' => 'ព្រះសីហនុ',
				'name_en' => 'Preah Sihanouk',
			],
			[
				'name' => 'ស្ទឹងត្រែង',
				'name_en' => 'Stung Treng',
			],
			[
				'name' => 'ស្វាយរៀង',
				'name_en' => 'Svay Rieng',
			],
			[
				'name' => 'តាកែវ',
				'name_en' => 'Takeo',
			],
			[
				'name' => 'ឧត្ដរមានជ័យ',
				'name_en' => 'Oddar Meanchey',
			],
			[
				'name' => 'កែប',
				'name_en' => 'Kep',
			],
			[
				'name' => 'ប៉ៃលិន',
				'name_en' => 'Pailin',
			],
			[
				'name' => 'ត្បូងឃ្មុំ',
				'name_en' => 'Tboung Khmum',
			],
		];
    DB::table('provinces')->insert($provinces);
    
		$districts = [
      [
        'name' => 'មង្គលបូរី',
        'name_en' => 'Mungkul Borey',
        'code' => '0102',
        'province_id' => 1
      ],
      [
        'name' => 'ភ្នំស្រុក',
        'name_en' => 'Phnum Srok',
        'code' => '0103',
        'province_id' => 1
      ],
      [
        'name' => 'ព្រះនេត្រព្រះ',
        'name_en' => 'Preah Netr Preah',
        'code' => '0104',
        'province_id' => 1
      ],
      [
        'name' => 'អូរជ្រៅ',
        'name_en' => 'Ou Chrov',
        'code' => '0105',
        'province_id' => 1
      ],
      [
        'name' => 'សិរីសោភ័ណ',
        'name_en' => 'Serey Sophorn',
        'code' => '0106',
        'province_id' => 1
      ],
      [
        'name' => 'ថ្មពួក',
        'name_en' => 'Thma Puok',
        'code' => '0107',
        'province_id' => 1
      ],
      [
        'name' => 'ស្វាយចេក',
        'name_en' => 'Svay Chek',
        'code' => '0108',
        'province_id' => 1
      ],
      [
        'name' => 'ម៉ាឡៃ',
        'name_en' => 'Malai',
        'code' => '0109',
        'province_id' => 1
      ],
      [
        'name' => 'បាណន់',
        'name_en' => 'Banan',
        'code' => '0201',
        'province_id' => 2
      ],
      [
        'name' => 'ថ្មគោល',
        'name_en' => 'Thmor Koul',
        'code' => '0202',
        'province_id' => 2
      ],
      [
        'name' => 'បវេល',
        'name_en' => 'Bavel',
        'code' => '0204',
        'province_id' => 2
      ],
      [
        'name' => 'ឯកភ្នំ',
        'name_en' => 'Aek Phnum',
        'code' => '0205',
        'province_id' => 2
      ],
      [
        'name' => 'មោងឫស្សី',
        'name_en' => 'Maung Russey',
        'code' => '0206',
        'province_id' => 2
      ],
      [
        'name' => 'រុក្ខគីរី',
        'name_en' => 'Rukhakiri',
        'code' => '0214',
        'province_id' => 2
      ],
      [
        'name' => 'រតនមណ្ឌល',
        'name_en' => 'Ratanak Mondul',
        'code' => '0207',
        'province_id' => 2
      ],
      [
        'name' => 'សង្កែ',
        'name_en' => 'Sangke',
        'code' => '0208',
        'province_id' => 2
      ],
      [
        'name' => 'សំឡូត',
        'name_en' => 'Samlaut',
        'code' => '0209',
        'province_id' => 2
      ],
      [
        'name' => 'សំពៅលូន',
        'name_en' => 'Sampov Loun',
        'code' => '0210',
        'province_id' => 2
      ],
      [
        'name' => 'ភ្នំព្រឹក',
        'name_en' => 'Phnum Proek',
        'code' => '0211',
        'province_id' => 2
      ],
      [
        'name' => 'កំរៀង',
        'name_en' => 'Kamreang',
        'code' => '0212',
        'province_id' => 2
      ],
      [
        'name' => 'គាស់ក្រឡ',
        'name_en' => 'Koas Krala',
        'code' => '0213',
        'province_id' => 2
      ],
      [
        'name' => 'បាត់ដំបង',
        'name_en' => 'Battambang',
        'code' => '0203',
        'province_id' => 2
      ],
      [
        'name' => 'ប៉ោយប៉ែត',
        'name_en' => 'Poipet',
        'code' => '0110',
        'province_id' => 1
      ],
      [
        'name' => 'កំពង់ចាម',
        'name_en' => 'Kampong Cham',
        'code' => '0304',
        'province_id' => 3
      ],
      [
        'name' => 'បាធាយ​',
        'name_en' => 'Batheay',
        'code' => '0301',
        'province_id' => 3
      ],
      [
        'name' => 'ចំការលើ​',
        'name_en' => 'Chamkar Leu',
        'code' => '0302',
        'province_id' => 3
      ],
      [
        'name' => 'ជើងព្រៃ​',
        'name_en' => 'Cheung Prey',
        'code' => '0303',
        'province_id' => 3
      ],
      [
        'name' => 'កំពង់សៀម​',
        'name_en' => 'Kampong Siem',
        'code' => '0305',
        'province_id' => 3
      ],
      [
        'name' => 'កងមាស​',
        'name_en' => 'Kang Meas',
        'code' => '0306',
        'province_id' => 3
      ],
      [
        'name' => 'កោះសូទិន​',
        'name_en' => 'Kaoh Soutin',
        'code' => '0307',
        'province_id' => 3
      ],
      [
        'name' => 'ព្រៃឈរ​',
        'name_en' => 'Prey Chhor',
        'code' => '0308',
        'province_id' => 3
      ],
      [
        'name' => 'ស្រីសន្ធរ​',
        'name_en' => 'Srey Santhor',
        'code' => '0309',
        'province_id' => 3
      ],
      [
        'name' => 'ស្ទឹងត្រង់',
        'name_en' => 'Stueng Trang',
        'code' => '0310',
        'province_id' => 3
      ],
      [
        'name' => 'បរិបូណ៌',
        'name_en' => 'Baribour',
        'code' => '0401',
        'province_id' => 4
      ],
      [
        'name' => 'ជលគីរី',
        'name_en' => 'Chol Kiri',
        'code' => '0402',
        'province_id' => 4
      ],
      [
        'name' => 'កំពង់ឆ្នាំង',
        'name_en' => 'Kampong Chhnang',
        'code' => '0403',
        'province_id' => 4
      ],
      [
        'name' => 'កំពង់លែង',
        'name_en' => 'Kampong Leaeng',
        'code' => '0404',
        'province_id' => 4
      ],
      [
        'name' => 'កំពង់ត្រឡាច',
        'name_en' => 'Kampong Tralach',
        'code' => '0405',
        'province_id' => 4
      ],
      [
        'name' => 'រលាប្អៀរ',
        'name_en' => 'Rolea B\'ier',
        'code' => '0406',
        'province_id' => 4
      ],
      [
        'name' => 'សាមគ្គីមានជ័យ',
        'name_en' => 'Sameakki Mean Chey',
        'code' => '0407',
        'province_id' => 4
      ],
      [
        'name' => 'ទឹកផុស',
        'name_en' => 'Tuek Phos',
        'code' => '0408',
        'province_id' => 4
      ],
      [
        'name' => 'បរសេដ្ឋ',
        'name_en' => 'Borsedth',
        'code' => '0501',
        'province_id' => 5
      ],
      [
        'name' => 'ច្បារមន',
        'name_en' => 'Chbar Mon',
        'code' => '0502',
        'province_id' => 5
      ],
      [
        'name' => 'គងពិសី',
        'name_en' => 'Kong Pisei',
        'code' => '0503',
        'province_id' => 5
      ],
      [
        'name' => 'ឱរ៉ាល់',
        'name_en' => 'Aoral',
        'code' => '0504',
        'province_id' => 5
      ],
      [
        'name' => 'ឧដុង្គ',
        'name_en' => 'Odongk',
        'code' => '0505',
        'province_id' => 5
      ],
      [
        'name' => 'ភ្នំស្រួច',
        'name_en' => 'Phnum Sruoch',
        'code' => '0506',
        'province_id' => 5
      ],
      [
        'name' => 'សំរោងទង',
        'name_en' => 'Samraong Tong',
        'code' => '0507',
        'province_id' => 5
      ],
      [
        'name' => 'ថ្ពង',
        'name_en' => 'Thpong',
        'code' => '0508',
        'province_id' => 5
      ],
      [
        'name' => 'បារាយណ៍',
        'name_en' => 'Baray',
        'code' => '0601',
        'province_id' => 6
      ],
      [
        'name' => 'កំពង់ស្វាយ',
        'name_en' => 'Kampong Svay',
        'code' => '0602',
        'province_id' => 6
      ],
      [
        'name' => 'ស្ទឹងសែន',
        'name_en' => 'Stueng Saen',
        'code' => '0603',
        'province_id' => 6
      ],
      [
        'name' => 'ប្រាសាទបល្ល័ង្ក',
        'name_en' => 'Prasat Balang',
        'code' => '0604',
        'province_id' => 6
      ],
      [
        'name' => 'ប្រាសាទសំបូរ',
        'name_en' => 'Prasat Sambour',
        'code' => '0605',
        'province_id' => 6
      ],
      [
        'name' => 'សណ្ដាន់',
        'name_en' => 'Sandan',
        'code' => '0606',
        'province_id' => 6
      ],
      [
        'name' => 'សន្ទុក',
        'name_en' => 'Santuk',
        'code' => '0607',
        'province_id' => 6
      ],
      [
        'name' => 'ស្ទោង',
        'name_en' => 'Stoung',
        'code' => '0608',
        'province_id' => 6
      ],
      [
        'name' => 'អង្គរជ័យ',
        'name_en' => 'Angkor Chey',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'បន្ទាយមាស',
        'name_en' => 'Bantay Meas',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'ឈូក',
        'name_en' => 'Chouk',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'ជុំគីរី',
        'name_en' => 'Chum Kiri',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'ដងទង់',
        'name_en' => 'Dong Tung',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'កំពង់ត្រាច',
        'name_en' => 'Kampong Trach',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'កំពត',
        'name_en' => 'Kampot',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'ទឹកឈូ',
        'name_en' => 'Tuek Chu',
        'code' => '',
        'province_id' => 7
      ],
      [
        'name' => 'កណ្ដាលស្ទឹង',
        'name_en' => 'Kandal Stueng',
        'code' => '0801',
        'province_id' => 8
      ],
      [
        'name' => 'កៀនស្វាយ',
        'name_en' => 'Kien Svay',
        'code' => '0802',
        'province_id' => 8
      ],
      [
        'name' => 'ខ្សាច់កណ្តាល',
        'name_en' => 'Khsach Kandal',
        'code' => '0803',
        'province_id' => 8
      ],
      [
        'name' => 'កោះធំ',
        'name_en' => 'Kaoh Thum',
        'code' => '0804',
        'province_id' => 8
      ],
      [
        'name' => 'លើកដែក',
        'name_en' => 'Leuk Daek',
        'code' => '0805',
        'province_id' => 8
      ],
      [
        'name' => 'ល្វាឯម',
        'name_en' => 'Lvea Aem',
        'code' => '0806',
        'province_id' => 8
      ],
      [
        'name' => 'មុខកំពូល',
        'name_en' => 'Mukh Kampul',
        'code' => '0807',
        'province_id' => 8
      ],
      [
        'name' => 'អង្គស្នួល',
        'name_en' => 'Angk Snuol',
        'code' => '0808',
        'province_id' => 8
      ],
      [
        'name' => 'ពញាឮ',
        'name_en' => 'Ponhea Lueu',
        'code' => '0809',
        'province_id' => 8
      ],
      [
        'name' => 'ស្អាង',
        'name_en' => 'S\'ang',
        'code' => '0810',
        'province_id' => 8
      ],
      [
        'name' => 'តាខ្មៅ',
        'name_en' => 'Ta Khmau',
        'code' => '0811',
        'province_id' => 8
      ],
      [
        'name' => 'បទុមសាគរ',
        'name_en' => 'Botum Sakor',
        'code' => '0901',
        'province_id' => 9
      ],
      [
        'name' => 'គីរីសាគរ',
        'name_en' => 'Kiri Sakor',
        'code' => '0902',
        'province_id' => 9
      ],
      [
        'name' => 'កោះកុង',
        'name_en' => 'Koh Kong',
        'code' => '0903',
        'province_id' => 9
      ],
      [
        'name' => 'ស្មាច់មានជ័យ',
        'name_en' => 'Smach Mean Chey',
        'code' => '0904',
        'province_id' => 9
      ],
      [
        'name' => 'មណ្ឌលសីមា',
        'name_en' => 'Mondol Seima',
        'code' => '0905',
        'province_id' => 9
      ],
      [
        'name' => 'ស្រែអំបិល',
        'name_en' => 'Srae Ambel',
        'code' => '0906',
        'province_id' => 9
      ],
      [
        'name' => 'ថ្មបាំង',
        'name_en' => 'Thmo Bang',
        'code' => '0907',
        'province_id' => 9
      ],
      [
        'name' => 'កំពង់សិលា',
        'name_en' => 'Kampong Seila',
        'code' => '0908',
        'province_id' => 9
      ],
      [
        'name' => 'ឆ្លូង​',
        'name_en' => 'Chhloung',
        'code' => '1001',
        'province_id' => 10
      ],
      [
        'name' => 'ក្រចេះ',
        'name_en' => 'Kratie',
        'code' => '1002',
        'province_id' => 10
      ],
      [
        'name' => 'ព្រែកប្រសព្វ',
        'name_en' => 'Preaek Prasab',
        'code' => '1003',
        'province_id' => 10
      ],
      [
        'name' => 'សំបូរ',
        'name_en' => 'Sambour',
        'code' => '1004',
        'province_id' => 10
      ],
      [
        'name' => 'ស្នួល',
        'name_en' => 'Snuol',
        'code' => '1005',
        'province_id' => 10
      ],
      [
        'name' => 'ចិត្របុរី',
        'name_en' => 'Chet Borei',
        'code' => '1006',
        'province_id' => 10
      ],
      [
        'name' => 'ស្រុកកែវសីមា',
        'name_en' => 'Kaev Seima',
        'code' => '1101',
        'province_id' => 11
      ],
      [
        'name' => 'ស្រុកកោះញែក',
        'name_en' => 'Kaoh Nheaek',
        'code' => '1102',
        'province_id' => 11
      ],
      [
        'name' => 'ស្រុកអូររាំង',
        'name_en' => 'Ou Reang',
        'code' => '1103',
        'province_id' => 11
      ],
      [
        'name' => 'ស្រុកពេជ្រាដា',
        'name_en' => 'Pech Chreada',
        'code' => '1104',
        'province_id' => 11
      ],
      [
        'name' => 'សែនមនោរម្យ',
        'name_en' => 'Senmonorom',
        'code' => '1105',
        'province_id' => 11
      ],
      [
        'name' => 'ចំការមន',
        'name_en' => 'Chamkar Mon',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ដូនពេញ',
        'name_en' => 'Doun Penh',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => '៧មករា',
        'name_en' => '7 Meakkakra',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ទួលគោក',
        'name_en' => 'Tuol Kouk',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ដង្កោ',
        'name_en' => 'Dangkao',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'មានជ័យ',
        'name_en' => 'Mean Chey',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ឫស្សីកែវ',
        'name_en' => 'Russey Keo',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'សែនសុខ',
        'name_en' => 'Sen Sok',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ពោធិ៍សែនជ័យ',
        'name_en' => 'Pur SenChey',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ជ្រោយចង្វារ',
        'name_en' => 'Chraoy Chongvar',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ព្រែកព្នៅ',
        'name_en' => 'Praek Pnov',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ច្បារអំពៅ',
        'name_en' => 'Chbar Ampov',
        'code' => '',
        'province_id' => 12
      ],
      [
        'name' => 'ជ័យសែន',
        'name_en' => 'Chey Saen',
        'code' => '1301',
        'province_id' => 13
      ],
      [
        'name' => 'ឆែប',
        'name_en' => 'Chhaeb',
        'code' => '1302',
        'province_id' => 13
      ],
      [
        'name' => 'ជាំក្សាន្ត',
        'name_en' => 'Choam Khsant',
        'code' => '1303',
        'province_id' => 13
      ],
      [
        'name' => 'គូលែន',
        'name_en' => 'Kuleaen',
        'code' => '1304',
        'province_id' => 13
      ],
      [
        'name' => 'វៀង',
        'name_en' => 'Rovieng',
        'code' => '1305',
        'province_id' => 13
      ],
      [
        'name' => 'សង្គមថ្មី',
        'name_en' => 'Sangkom Thmei',
        'code' => '1306',
        'province_id' => 13
      ],
      [
        'name' => 'ត្បែងមានជ័យ',
        'name_en' => 'Tbaeng Mean chey',
        'code' => '1307',
        'province_id' => 13
      ],
      [
        'name' => 'ព្រៃវែង​',
        'name_en' => 'Prey Veng',
        'code' => '1401',
        'province_id' => 14
      ],
      [
        'name' => 'កំចាយមារ​',
        'name_en' => 'Kamchay Mea',
        'code' => '1402',
        'province_id' => 14
      ],
      [
        'name' => 'កំពង់ត្របែក',
        'name_en' => 'Kampong Trobek',
        'code' => '1403',
        'province_id' => 14
      ],
      [
        'name' => 'កញ្ច្រៀច​',
        'name_en' => 'Kachreach',
        'code' => '1404',
        'province_id' => 14
      ],
      [
        'name' => 'មេសាង​',
        'name_en' => 'Mesang',
        'code' => '1405',
        'province_id' => 14
      ],
      [
        'name' => 'ពាមជរ​',
        'name_en' => 'Peamchor',
        'code' => '1406',
        'province_id' => 14
      ],
      [
        'name' => 'ពាមរ​',
        'name_en' => 'Peamr',
        'code' => '1407',
        'province_id' => 14
      ],
      [
        'name' => 'ពារាំង​',
        'name_en' => 'Peareang',
        'code' => '1408',
        'province_id' => 14
      ],
      [
        'name' => 'ព្រះស្ដេច​',
        'name_en' => 'Prehsdach',
        'code' => '1409',
        'province_id' => 14
      ],
      [
        'name' => 'ស្វាយអន្ទរ​',
        'name_en' => 'Svay Ontor',
        'code' => '1410',
        'province_id' => 14
      ],
      [
        'name' => 'បាភ្នំ​',
        'name_en' => 'Baphnum',
        'code' => '1411',
        'province_id' => 14
      ],
      [
        'name' => 'ស៊ីធរកណ្ដាល​',
        'name_en' => 'Sithor Kandal',
        'code' => '1412',
        'province_id' => 14
      ],
      [
        'name' => 'កំពង់លាវ',
        'name_en' => 'Kampong Leav',
        'code' => '1413',
        'province_id' => 14
      ],
      [
        'name' => 'បាកាន',
        'name_en' => 'Bakan',
        'code' => '1501',
        'province_id' => 15
      ],
      [
        'name' => 'កណ្តៀង',
        'name_en' => 'Kandeang',
        'code' => '1502',
        'province_id' => 15
      ],
      [
        'name' => 'ក្រគរ',
        'name_en' => 'Krokor',
        'code' => '1503',
        'province_id' => 15
      ],
      [
        'name' => 'ភ្នំក្រវាញ',
        'name_en' => 'Phnum Kravanh',
        'code' => '1504',
        'province_id' => 15
      ],
      [
        'name' => 'ពោធិ៍សាត់',
        'name_en' => 'Pursat',
        'code' => '1505',
        'province_id' => 15
      ],
      [
        'name' => 'វាលវែង',
        'name_en' => 'Veal Veaeng',
        'code' => '1506',
        'province_id' => 15
      ],
      [
        'name' => 'អណ្តូងមាស​',
        'name_en' => 'Andoung Meas',
        'code' => '1601',
        'province_id' => 16
      ],
      [
        'name' => 'បានលុង',
        'name_en' => 'Ban Lung',
        'code' => '1602',
        'province_id' => 16
      ],
      [
        'name' => 'បរកែវ',
        'name_en' => 'Bar Kaev',
        'code' => '1603',
        'province_id' => 16
      ],
      [
        'name' => 'កូនមុំ',
        'name_en' => 'Koun Mom',
        'code' => '1604',
        'province_id' => 16
      ],
      [
        'name' => 'លំផាត់',
        'name_en' => 'Lumphat',
        'code' => '1605',
        'province_id' => 16
      ],
      [
        'name' => 'អូរជុំ',
        'name_en' => 'Ou Chum',
        'code' => '1606',
        'province_id' => 16
      ],
      [
        'name' => 'អូរយ៉ាដាវ',
        'name_en' => 'Ou Ya Dav',
        'code' => '1607',
        'province_id' => 16
      ],
      [
        'name' => 'តាវែង',
        'name_en' => 'Ta Veaeng',
        'code' => '1608',
        'province_id' => 16
      ],
      [
        'name' => 'វើនសៃ',
        'name_en' => 'Veun Sai',
        'code' => '1609',
        'province_id' => 16
      ],
      [
        'name' => 'អង្គរជុំ',
        'name_en' => 'Angkor Chum',
        'code' => '1701',
        'province_id' => 17
      ],
      [
        'name' => 'អង្គរធំ',
        'name_en' => 'Angkor Thum',
        'code' => '1702',
        'province_id' => 17
      ],
      [
        'name' => 'បន្ទាយស្រី',
        'name_en' => 'Banteay Srei',
        'code' => '1703',
        'province_id' => 17
      ],
      [
        'name' => 'ជីក្រែង',
        'name_en' => 'Chi Kraeng',
        'code' => '1704',
        'province_id' => 17
      ],
      [
        'name' => 'ក្រឡាញ់',
        'name_en' => 'Kralanh',
        'code' => '1706',
        'province_id' => 17
      ],
      [
        'name' => 'ពួក',
        'name_en' => 'Puok',
        'code' => '1707',
        'province_id' => 17
      ],
      [
        'name' => 'ប្រាសាទបាគង',
        'name_en' => 'Prasat Bakong',
        'code' => '1709',
        'province_id' => 17
      ],
      [
        'name' => 'សៀមរាប',
        'name_en' => 'Siem Reab',
        'code' => '1710',
        'province_id' => 17
      ],
      [
        'name' => 'សូទ្រនិគម',
        'name_en' => 'Soutr Nikom',
        'code' => '1711',
        'province_id' => 17
      ],
      [
        'name' => 'ស្រីស្នំ',
        'name_en' => 'Srei Snam',
        'code' => '1712',
        'province_id' => 17
      ],
      [
        'name' => 'ស្វាយលើ',
        'name_en' => 'Svay Leu',
        'code' => '1713',
        'province_id' => 17
      ],
      [
        'name' => 'វ៉ារិន',
        'name_en' => 'Varin',
        'code' => '1714',
        'province_id' => 17
      ],
      [
        'name' => 'មិត្តភាព',
        'name_en' => 'Mittakpheap',
        'code' => '1801',
        'province_id' => 18
      ],
      [
        'name' => 'ព្រៃនប់',
        'name_en' => 'Prey Nob',
        'code' => '1802',
        'province_id' => 18
      ],
      [
        'name' => 'ស្ទឹងហាវ',
        'name_en' => 'Stueng Hav',
        'code' => '1803',
        'province_id' => 18
      ],
      [
        'name' => 'កំពង់សីលា',
        'name_en' => 'Kampong Seila',
        'code' => '1804',
        'province_id' => 18
      ],
      [
        'name' => 'សេសាន',
        'name_en' => 'Sesan',
        'code' => '1901',
        'province_id' => 19
      ],
      [
        'name' => 'សៀមបូក',
        'name_en' => 'Siem Bouk',
        'code' => '1902',
        'province_id' => 19
      ],
      [
        'name' => 'សៀមប៉ាង',
        'name_en' => 'Siem Pang',
        'code' => '1903',
        'province_id' => 19
      ],
      [
        'name' => 'ស្ទឹងត្រែង',
        'name_en' => 'Stueng Traeng',
        'code' => '1904',
        'province_id' => 19
      ],
      [
        'name' => 'ថាឡាបរិវ៉ាត់',
        'name_en' => 'Thala Barivat',
        'code' => '1905',
        'province_id' => 19
      ],
      [
        'name' => 'ចន្រ្ទា​',
        'name_en' => 'Chanthrea',
        'code' => '2001',
        'province_id' => 20
      ],
      [
        'name' => 'កំពង់រោទិ៍',
        'name_en' => 'Kampong Rou',
        'code' => '2002',
        'province_id' => 20
      ],
      [
        'name' => 'រំដួល',
        'name_en' => 'Romdoul',
        'code' => '2003',
        'province_id' => 20
      ],
      [
        'name' => 'រមាសហែក',
        'name_en' => 'Romeas Haek',
        'code' => '2004',
        'province_id' => 20
      ],
      [
        'name' => 'ស្វាយជ្រំ',
        'name_en' => 'Svay Chrom',
        'code' => '2005',
        'province_id' => 20
      ],
      [
        'name' => 'ស្វាយរៀង',
        'name_en' => 'Svay Rieng',
        'code' => '2006',
        'province_id' => 20
      ],
      [
        'name' => 'ស្វាយទាប',
        'name_en' => 'Svay Theab',
        'code' => '2007',
        'province_id' => 20
      ],
      [
        'name' => 'បាវិត',
        'name_en' => 'Bavet',
        'code' => '2008',
        'province_id' => 20
      ],
      [
        'name' => 'អង្គរបូរី​',
        'name_en' => 'Angkor Borei',
        'code' => '2101',
        'province_id' => 21
      ],
      [
        'name' => 'បាទី',
        'name_en' => 'Bati',
        'code' => '2102',
        'province_id' => 21
      ],
      [
        'name' => 'បូរីជលសារ',
        'name_en' => 'Borei Cholsar',
        'code' => '2103',
        'province_id' => 21
      ],
      [
        'name' => 'គិរីវង់',
        'name_en' => 'Kiri Vong',
        'code' => '2104',
        'province_id' => 21
      ],
      [
        'name' => 'កោះអណ្តែត',
        'name_en' => 'Kaoh Andaet',
        'code' => '2105',
        'province_id' => 21
      ],
      [
        'name' => 'ព្រៃកប្បាស',
        'name_en' => 'Prey Kabbas',
        'code' => '2106',
        'province_id' => 21
      ],
      [
        'name' => 'សំរោង',
        'name_en' => 'Samraong',
        'code' => '2107',
        'province_id' => 21
      ],
      [
        'name' => 'ដូនកែវ',
        'name_en' => 'Doun Kaev',
        'code' => '2108',
        'province_id' => 21
      ],
      [
        'name' => 'ត្រាំកក់',
        'name_en' => 'Tram Kak',
        'code' => '2109',
        'province_id' => 21
      ],
      [
        'name' => 'ទ្រាំង',
        'name_en' => 'Treang',
        'code' => '2110',
        'province_id' => 21
      ],
      [
        'name' => 'ដំណាក់ចង្អើរ',
        'name_en' => 'Damnak Chang\'aeur',
        'code' => '2201',
        'province_id' => 23
      ],
      [
        'name' => 'កែប',
        'name_en' => 'Kep',
        'code' => '2202',
        'province_id' => 23
      ],
      [
        'name' => 'ប៉ៃលិន​',
        'name_en' => 'Pailin',
        'code' => '2301',
        'province_id' => 24
      ],
      [
        'name' => 'សាលា​​ក្រៅ',
        'name_en' => 'Salakrao',
        'code' => '2302',
        'province_id' => 24
      ],
      [
        'name' => 'អន្លង់វែង',
        'name_en' => 'Anlong Veng',
        'code' => '2201',
        'province_id' => 22
      ],
      [
        'name' => 'បន្ទាយអំពិល',
        'name_en' => 'Banteay Ampil',
        'code' => '2202',
        'province_id' => 22
      ],
      [
        'name' => 'ចុងកាល់',
        'name_en' => 'Chong Kal',
        'code' => '2203',
        'province_id' => 22
      ],
      [
        'name' => 'សំរោង',
        'name_en' => 'Samraong',
        'code' => '2204',
        'province_id' => 22
      ],
      [
        'name' => 'ត្រពាំងប្រាសាទ',
        'name_en' => 'Trapeang Prasat',
        'code' => '2205',
        'province_id' => 22
      ],
      [
        'name' => 'ដំបែ',
        'name_en' => 'Dambe',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'ក្រូចឆ្មារ',
        'name_en' => 'Krochhma',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'មេមត់',
        'name_en' => 'Memut',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'អូររាំងឪ',
        'name_en' => 'Orangov',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'ពញាក្រែក',
        'name_en' => 'Punhea Krek',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'ត្បូងឃ្មុំ',
        'name_en' => 'Tboung Khmum',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'សួង',
        'name_en' => 'Soung',
        'code' => '',
        'province_id' => 25
      ],
      [
        'name' => 'ព្រះសីហនុ',
        'name_en' => 'Sihanoukville',
        'code' => '០',
        'province_id' => 18
      ],
      [
        'name' => 'បឹងកេងកង',
        'name_en' => 'Boeung Keng Kang',
        'code' => '120000',
        'province_id' => 12
      ],
      [
        'name' => 'កំបូល',
        'name_en' => 'Kantaok',
        'code' => '0000',
        'province_id' => 12
      ],
		];
    DB::table('districts')->insert($districts);
    

		// Insert some languages
		$roles = [
			[
				'name' => 'Dev Admin',
				'guard_name' => 'web',
				'description' => 'Power Administrator or Super Administrator is the highest admin that has all right to CRUD or coding to change everything',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Admin',
				'guard_name' => 'web',
				'description' => 'Administrator is a no normal admin.',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User',
				'guard_name' => 'web',
				'description' => 'User with no right',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Receptionist',
				'guard_name' => 'web',
				'description' => 'Teacher',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
		];
		DB::table('roles')->insert($roles);
		
		$users =[
			[
				'first_name' => 'Web',
				'last_name' => 'Dev',
				'phone' => '0',
				'gender' => '1',
				'email' => 'web@dev.com',
				'password' => '$2y$10$t8QOzY6vEWArgzqEwGaj/etY/o09UHqwyFYw5K3eJogQbRFQkt6Xi',
				'status' => '1',
				'approval' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
		];
		DB::table('users')->insert($users);
		
		// Insert some languages
		$permissions = [
			[
				'name' => 'Permission Index',
				'guard_name' => 'web',
				'description' => 'Visit Permission Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Permission Create',
				'guard_name' => 'web',
				'description' => 'Create new Permission',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Permission Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Permission',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Permission Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Permission',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Permission Assign User',
				'guard_name' => 'web',
				'description' => 'Assign Permissions to Users',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Permission Assign Role',
				'guard_name' => 'web',
				'description' => 'Assign Permissions to Roles',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Index',
				'guard_name' => 'web',
				'description' => 'Visit Role Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Create',
				'guard_name' => 'web',
				'description' => 'Create new Role',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Role',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Role',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Assign User',
				'guard_name' => 'web',
				'description' => 'Assign Roles to Users',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Role Assign Permission',
				'guard_name' => 'web',
				'description' => 'Assign Permission to Users',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Index',
				'guard_name' => 'web',
				'description' => 'Visit User Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Create',
				'guard_name' => 'web',
				'description' => 'Create new User',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed User',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed User',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Password',
				'guard_name' => 'web',
				'description' => 'Change Password User',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Assign Role',
				'guard_name' => 'web',
				'description' => 'Assign Roles to Users',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'User Assign Permission',
				'guard_name' => 'web',
				'description' => 'Assign Permission to Users',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Province Index',
				'guard_name' => 'web',
				'description' => 'Visit Province Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Province Create',
				'guard_name' => 'web',
				'description' => 'Create new Province',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Province Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Province',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Province Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Province',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'District Index',
				'guard_name' => 'web',
				'description' => 'Visit District Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'District Create',
				'guard_name' => 'web',
				'description' => 'Create new District',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'District Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed District',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'District Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed District',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Medicine Index',
				'guard_name' => 'web',
				'description' => 'Visit Medicine Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Medicine Create',
				'guard_name' => 'web',
				'description' => 'Create new Medicine',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Medicine Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Medicine',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Medicine Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Medicine',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Usage Index',
				'guard_name' => 'web',
				'description' => 'Visit Usage Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Usage Create',
				'guard_name' => 'web',
				'description' => 'Create new Usage',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Usage Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Usage',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Usage Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Usage',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Doctor Index',
				'guard_name' => 'web',
				'description' => 'Visit Doctor Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Doctor Create',
				'guard_name' => 'web',
				'description' => 'Create new Doctor',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Doctor Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Doctor',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Doctor Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Doctor',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Doctor Show',
				'guard_name' => 'web',
				'description' => 'Show Doctor detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Patient Index',
				'guard_name' => 'web',
				'description' => 'Visit Patient Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Patient Create',
				'guard_name' => 'web',
				'description' => 'Create new Patient',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Patient Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Patient',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Patient Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Patient',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Patient Show',
				'guard_name' => 'web',
				'description' => 'Show Patient detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Service Index',
				'guard_name' => 'web',
				'description' => 'Visit Service Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Service Create',
				'guard_name' => 'web',
				'description' => 'Create new Service',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Service Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Service',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Service Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Service',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Service Show',
				'guard_name' => 'web',
				'description' => 'Show Service detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Index',
				'guard_name' => 'web',
				'description' => 'Visit Invoice Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Create',
				'guard_name' => 'web',
				'description' => 'Create new Invoice',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Invoice',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Invoice',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Show',
				'guard_name' => 'web',
				'description' => 'Show Invoice detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Invoice Print',
				'guard_name' => 'web',
				'description' => 'Show Invoice detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Index',
				'guard_name' => 'web',
				'description' => 'Visit Prescription Index',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Create',
				'guard_name' => 'web',
				'description' => 'Create new Prescription',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Prescription',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Prescription',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Show',
				'guard_name' => 'web',
				'description' => 'Show Prescription detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Prescription Print',
				'guard_name' => 'web',
				'description' => 'Print Prescription detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Default Description Create',
				'guard_name' => 'web',
				'description' => 'Create new Echo Default Description',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Default Description Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Echo Default Description',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Default Description Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Echo Default Description',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Default Description Show',
				'guard_name' => 'web',
				'description' => 'Show Echo Default Description detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Create',
				'guard_name' => 'web',
				'description' => 'Create new Echo',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Edit',
				'guard_name' => 'web',
				'description' => 'Edit Existed Echo',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Delete',
				'guard_name' => 'web',
				'description' => 'Delete Existed Echo',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Show',
				'guard_name' => 'web',
				'description' => 'Show Echo detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Echo Print',
				'guard_name' => 'web',
				'description' => 'Print Echo detail',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Setting Index',
				'guard_name' => 'web',
				'description' => 'Change Setting',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			],
		];
		DB::table('permissions')->insert($permissions);
		
		
		$all_permissions = Permission::pluck('name');

		Role::find('1')->syncPermissions($all_permissions);

		User::find('1')->assignRole('Dev Admin');
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($tableNames['role_has_permissions']);
		Schema::drop($tableNames['model_has_roles']);
		Schema::drop($tableNames['model_has_permissions']);
		Schema::drop($tableNames['roles']);
		Schema::drop($tableNames['permissions']);
    Schema::dropIfExists('provinces');
    Schema::dropIfExists('districts');
	}
}

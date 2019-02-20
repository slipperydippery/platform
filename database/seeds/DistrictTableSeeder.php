<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->delete();

        $districts = [
            [
                'id' => '1',
                'scanmodel_id' => '1',
                'name' => 'Aa en Hunze',
            ],
            [
                'id' => '2',
                'scanmodel_id' => '1',
                'name' => 'Aalburg',
            ],
            [
                'id' => '3',
                'scanmodel_id' => '1',
                'name' => 'Aalsmeer',
            ],
            [
                'id' => '4',
                'scanmodel_id' => '1',
                'name' => 'Aalten',
            ],
            [
                'id' => '5',
                'scanmodel_id' => '1',
                'name' => 'Achtkarspelen',
            ],
            [
                'id' => '6',
                'scanmodel_id' => '1',
                'name' => 'Alblasserdam',
            ],
            [
                'id' => '7',
                'scanmodel_id' => '1',
                'name' => 'Albrandswaard',
            ],
            [
                'id' => '8',
                'scanmodel_id' => '1',
                'name' => 'Alkmaar',
            ],
            [
                'id' => '9',
                'scanmodel_id' => '1',
                'name' => 'Almelo',
            ],
            [
                'id' => '10',
                'scanmodel_id' => '1',
                'name' => 'Almere',
            ],
            [
                'id' => '11',
                'scanmodel_id' => '1',
                'name' => 'Alphen aan den Rijn',
            ],
            [
                'id' => '12',
                'scanmodel_id' => '1',
                'name' => 'Alphen-Chaam',
            ],
            [
                'id' => '13',
                'scanmodel_id' => '1',
                'name' => 'Ameland',
            ],
            [
                'id' => '14',
                'scanmodel_id' => '1',
                'name' => 'Amersfoort',
            ],
            [
                'id' => '15',
                'scanmodel_id' => '1',
                'name' => 'Amstelveen',
            ],
            [
                'id' => '16',
                'scanmodel_id' => '1',
                'name' => 'Amsterdam',
            ],
            [
                'id' => '17',
                'scanmodel_id' => '1',
                'name' => 'Apeldoorn',
            ],
            [
                'id' => '18',
                'scanmodel_id' => '1',
                'name' => 'Appingedam',
            ],
            [
                'id' => '19',
                'scanmodel_id' => '1',
                'name' => 'Arnhem',
            ],
            [
                'id' => '20',
                'scanmodel_id' => '1',
                'name' => 'Assen',
            ],
            [
                'id' => '21',
                'scanmodel_id' => '1',
                'name' => 'Asten',
            ],
            [
                'id' => '22',
                'scanmodel_id' => '1',
                'name' => 'Baarle-Nassau',
            ],
            [
                'id' => '23',
                'scanmodel_id' => '1',
                'name' => 'Baarn',
            ],
            [
                'id' => '24',
                'scanmodel_id' => '1',
                'name' => 'Barendrecht',
            ],
            [
                'id' => '25',
                'scanmodel_id' => '1',
                'name' => 'Barneveld',
            ],
            [
                'id' => '26',
                'scanmodel_id' => '1',
                'name' => 'Bedum',
            ],
            [
                'id' => '27',
                'scanmodel_id' => '1',
                'name' => 'Beek',
            ],
            [
                'id' => '28',
                'scanmodel_id' => '1',
                'name' => 'Beemster',
            ],
            [
                'id' => '29',
                'scanmodel_id' => '1',
                'name' => 'Beesel',
            ],
            [
                'id' => '30',
                'scanmodel_id' => '1',
                'name' => 'Bellingwedde',
            ],
            [
                'id' => '31',
                'scanmodel_id' => '1',
                'name' => 'Berg en Dal',
            ],
            [
                'id' => '32',
                'scanmodel_id' => '1',
                'name' => 'Bergeijk',
            ],
            [
                'id' => '33',
                'scanmodel_id' => '1',
                'name' => 'Bergen (Limburg)',
            ],
            [
                'id' => '34',
                'scanmodel_id' => '1',
                'name' => 'Bergen (Noord-Holland)',
            ],
            [
                'id' => '35',
                'scanmodel_id' => '1',
                'name' => 'Bergen op Zoom',
            ],
            [
                'id' => '36',
                'scanmodel_id' => '1',
                'name' => 'Berkelland',
            ],
            [
                'id' => '37',
                'scanmodel_id' => '1',
                'name' => 'Bernheze',
            ],
            [
                'id' => '38',
                'scanmodel_id' => '1',
                'name' => 'Best',
            ],
            [
                'id' => '39',
                'scanmodel_id' => '1',
                'name' => 'Beuningen',
            ],
            [
                'id' => '40',
                'scanmodel_id' => '1',
                'name' => 'Beverwijk',
            ],
            [
                'id' => '41',
                'scanmodel_id' => '1',
                'name' => 'Binnenmaas',
            ],
            [
                'id' => '42',
                'scanmodel_id' => '1',
                'name' => 'Bladel',
            ],
            [
                'id' => '43',
                'scanmodel_id' => '1',
                'name' => 'Blaricum',
            ],
            [
                'id' => '44',
                'scanmodel_id' => '1',
                'name' => 'Bloemendaal',
            ],
            [
                'id' => '45',
                'scanmodel_id' => '1',
                'name' => 'Bodegraven-Reeuwijk',
            ],
            [
                'id' => '46',
                'scanmodel_id' => '1',
                'name' => 'Boekel',
            ],
            [
                'id' => '47',
                'scanmodel_id' => '1',
                'name' => 'Bonaire',
            ],
            [
                'id' => '48',
                'scanmodel_id' => '1',
                'name' => 'Borger-Odoorn',
            ],
            [
                'id' => '49',
                'scanmodel_id' => '1',
                'name' => 'Borne',
            ],
            [
                'id' => '50',
                'scanmodel_id' => '1',
                'name' => 'Borsele',
            ],
            [
                'id' => '51',
                'scanmodel_id' => '1',
                'name' => 'Boxmeer',
            ],
            [
                'id' => '52',
                'scanmodel_id' => '1',
                'name' => 'Boxtel',
            ],
            [
                'id' => '53',
                'scanmodel_id' => '1',
                'name' => 'Breda',
            ],
            [
                'id' => '54',
                'scanmodel_id' => '1',
                'name' => 'Brielle',
            ],
            [
                'id' => '55',
                'scanmodel_id' => '1',
                'name' => 'Bronckhorst',
            ],
            [
                'id' => '56',
                'scanmodel_id' => '1',
                'name' => 'Brummen',
            ],
            [
                'id' => '57',
                'scanmodel_id' => '1',
                'name' => 'Brunssum',
            ],
            [
                'id' => '58',
                'scanmodel_id' => '1',
                'name' => 'Bunnik',
            ],
            [
                'id' => '59',
                'scanmodel_id' => '1',
                'name' => 'Bunschoten',
            ],
            [
                'id' => '60',
                'scanmodel_id' => '1',
                'name' => 'Buren',
            ],
            [
                'id' => '61',
                'scanmodel_id' => '1',
                'name' => 'Capelle aan den IJssel',
            ],
            [
                'id' => '62',
                'scanmodel_id' => '1',
                'name' => 'Castricum',
            ],
            [
                'id' => '63',
                'scanmodel_id' => '1',
                'name' => 'Coevorden',
            ],
            [
                'id' => '64',
                'scanmodel_id' => '1',
                'name' => 'Cranendonck',
            ],
            [
                'id' => '65',
                'scanmodel_id' => '1',
                'name' => 'Cromstrijen',
            ],
            [
                'id' => '66',
                'scanmodel_id' => '1',
                'name' => 'Cuijk',
            ],
            [
                'id' => '67',
                'scanmodel_id' => '1',
                'name' => 'Culemborg',
            ],
            [
                'id' => '68',
                'scanmodel_id' => '1',
                'name' => 'Dalfsen',
            ],
            [
                'id' => '69',
                'scanmodel_id' => '1',
                'name' => 'Dantumadeel',
            ],
            [
                'id' => '70',
                'scanmodel_id' => '1',
                'name' => 'De Bilt',
            ],
            [
                'id' => '71',
                'scanmodel_id' => '1',
                'name' => 'De Friese Meren',
            ],
            [
                'id' => '72',
                'scanmodel_id' => '1',
                'name' => 'De Marne',
            ],
            [
                'id' => '73',
                'scanmodel_id' => '1',
                'name' => 'De Ronde Venen',
            ],
            [
                'id' => '74',
                'scanmodel_id' => '1',
                'name' => 'De Wolden',
            ],
            [
                'id' => '75',
                'scanmodel_id' => '1',
                'name' => 'Delft',
            ],
            [
                'id' => '76',
                'scanmodel_id' => '1',
                'name' => 'Delfzijl',
            ],
            [
                'id' => '77',
                'scanmodel_id' => '1',
                'name' => 'Den Haag (&#39;s-Gravenhage)',
            ],
            [
                'id' => '78',
                'scanmodel_id' => '1',
                'name' => 'Den Helder',
            ],
            [
                'id' => '79',
                'scanmodel_id' => '1',
                'name' => 'Deurne',
            ],
            [
                'id' => '80',
                'scanmodel_id' => '1',
                'name' => 'Deventer',
            ],
            [
                'id' => '81',
                'scanmodel_id' => '1',
                'name' => 'Diemen',
            ],
            [
                'id' => '82',
                'scanmodel_id' => '1',
                'name' => 'Dinkelland',
            ],
            [
                'id' => '83',
                'scanmodel_id' => '1',
                'name' => 'Doesburg',
            ],
            [
                'id' => '84',
                'scanmodel_id' => '1',
                'name' => 'Doetinchem',
            ],
            [
                'id' => '85',
                'scanmodel_id' => '1',
                'name' => 'Dongen',
            ],
            [
                'id' => '86',
                'scanmodel_id' => '1',
                'name' => 'Dongeradeel',
            ],
            [
                'id' => '87',
                'scanmodel_id' => '1',
                'name' => 'Dordrecht',
            ],
            [
                'id' => '88',
                'scanmodel_id' => '1',
                'name' => 'Drechterland',
            ],
            [
                'id' => '89',
                'scanmodel_id' => '1',
                'name' => 'Drimmelen',
            ],
            [
                'id' => '90',
                'scanmodel_id' => '1',
                'name' => 'Dronten',
            ],
            [
                'id' => '91',
                'scanmodel_id' => '1',
                'name' => 'Druten',
            ],
            [
                'id' => '92',
                'scanmodel_id' => '1',
                'name' => 'Duiven',
            ],
            [
                'id' => '93',
                'scanmodel_id' => '1',
                'name' => 'Echt-Susteren',
            ],
            [
                'id' => '94',
                'scanmodel_id' => '1',
                'name' => 'Edam-Volendam',
            ],
            [
                'id' => '95',
                'scanmodel_id' => '1',
                'name' => 'Ede',
            ],
            [
                'id' => '96',
                'scanmodel_id' => '1',
                'name' => 'Eemnes',
            ],
            [
                'id' => '97',
                'scanmodel_id' => '1',
                'name' => 'Eemsmond',
            ],
            [
                'id' => '98',
                'scanmodel_id' => '1',
                'name' => 'Eersel',
            ],
            [
                'id' => '99',
                'scanmodel_id' => '1',
                'name' => 'Eijsden-Margraten',
            ],
            [
                'id' => '100',
                'scanmodel_id' => '1',
                'name' => 'Eindhoven',
            ],
            [
                'id' => '101',
                'scanmodel_id' => '1',
                'name' => 'Elburg',
            ],
            [
                'id' => '102',
                'scanmodel_id' => '1',
                'name' => 'Emmen',
            ],
            [
                'id' => '103',
                'scanmodel_id' => '1',
                'name' => 'Enkhuizen',
            ],
            [
                'id' => '104',
                'scanmodel_id' => '1',
                'name' => 'Enschede',
            ],
            [
                'id' => '105',
                'scanmodel_id' => '1',
                'name' => 'Epe',
            ],
            [
                'id' => '106',
                'scanmodel_id' => '1',
                'name' => 'Ermelo',
            ],
            [
                'id' => '107',
                'scanmodel_id' => '1',
                'name' => 'Etten-Leur',
            ],
            [
                'id' => '108',
                'scanmodel_id' => '1',
                'name' => 'Ferwerderadeel',
            ],
            [
                'id' => '109',
                'scanmodel_id' => '1',
                'name' => 'Franekeradeel',
            ],
            [
                'id' => '110',
                'scanmodel_id' => '1',
                'name' => 'Geertruidenberg',
            ],
            [
                'id' => '111',
                'scanmodel_id' => '1',
                'name' => 'Geldermalsen',
            ],
            [
                'id' => '112',
                'scanmodel_id' => '1',
                'name' => 'Geldrop-Mierlo',
            ],
            [
                'id' => '113',
                'scanmodel_id' => '1',
                'name' => 'Gemert-Bakel',
            ],
            [
                'id' => '114',
                'scanmodel_id' => '1',
                'name' => 'Gennep',
            ],
            [
                'id' => '115',
                'scanmodel_id' => '1',
                'name' => 'Giessenlanden',
            ],
            [
                'id' => '116',
                'scanmodel_id' => '1',
                'name' => 'Gilze en Rijen',
            ],
            [
                'id' => '117',
                'scanmodel_id' => '1',
                'name' => 'Goeree-Overflakkee',
            ],
            [
                'id' => '118',
                'scanmodel_id' => '1',
                'name' => 'Goes',
            ],
            [
                'id' => '119',
                'scanmodel_id' => '1',
                'name' => 'Goirle',
            ],
            [
                'id' => '120',
                'scanmodel_id' => '1',
                'name' => 'Gooise Meren',
            ],
            [
                'id' => '121',
                'scanmodel_id' => '1',
                'name' => 'Gorinchem (Gorcum of Gorkum)',
            ],
            [
                'id' => '122',
                'scanmodel_id' => '1',
                'name' => 'Gouda',
            ],
            [
                'id' => '123',
                'scanmodel_id' => '1',
                'name' => 'Grave',
            ],
            [
                'id' => '124',
                'scanmodel_id' => '1',
                'name' => 'Groningen',
            ],
            [
                'id' => '125',
                'scanmodel_id' => '1',
                'name' => 'Grootegast',
            ],
            [
                'id' => '126',
                'scanmodel_id' => '1',
                'name' => 'Gulpen-Wittem',
            ],
            [
                'id' => '127',
                'scanmodel_id' => '1',
                'name' => 'Haaksbergen',
            ],
            [
                'id' => '128',
                'scanmodel_id' => '1',
                'name' => 'Haaren',
            ],
            [
                'id' => '129',
                'scanmodel_id' => '1',
                'name' => 'Haarlem',
            ],
            [
                'id' => '130',
                'scanmodel_id' => '1',
                'name' => 'Haarlemmerliede en Spaarnwoude',
            ],
            [
                'id' => '131',
                'scanmodel_id' => '1',
                'name' => 'Haarlemmermeer',
            ],
            [
                'id' => '132',
                'scanmodel_id' => '1',
                'name' => 'Halderberge',
            ],
            [
                'id' => '133',
                'scanmodel_id' => '1',
                'name' => 'Hardenberg',
            ],
            [
                'id' => '134',
                'scanmodel_id' => '1',
                'name' => 'Harderwijk',
            ],
            [
                'id' => '135',
                'scanmodel_id' => '1',
                'name' => 'Hardinxveld-Giessendam',
            ],
            [
                'id' => '136',
                'scanmodel_id' => '1',
                'name' => 'Haren',
            ],
            [
                'id' => '137',
                'scanmodel_id' => '1',
                'name' => 'Harlingen',
            ],
            [
                'id' => '138',
                'scanmodel_id' => '1',
                'name' => 'Hattem',
            ],
            [
                'id' => '139',
                'scanmodel_id' => '1',
                'name' => 'Heemskerk',
            ],
            [
                'id' => '140',
                'scanmodel_id' => '1',
                'name' => 'Heemstede',
            ],
            [
                'id' => '141',
                'scanmodel_id' => '1',
                'name' => 'Heerde',
            ],
            [
                'id' => '142',
                'scanmodel_id' => '1',
                'name' => 'Heerenveen',
            ],
            [
                'id' => '143',
                'scanmodel_id' => '1',
                'name' => 'Heerhugowaard',
            ],
            [
                'id' => '144',
                'scanmodel_id' => '1',
                'name' => 'Heerlen',
            ],
            [
                'id' => '145',
                'scanmodel_id' => '1',
                'name' => 'Heeze-Leende',
            ],
            [
                'id' => '146',
                'scanmodel_id' => '1',
                'name' => 'Heiloo',
            ],
            [
                'id' => '147',
                'scanmodel_id' => '1',
                'name' => 'Hellendoorn',
            ],
            [
                'id' => '148',
                'scanmodel_id' => '1',
                'name' => 'Hellevoetsluis',
            ],
            [
                'id' => '149',
                'scanmodel_id' => '1',
                'name' => 'Helmond',
            ],
            [
                'id' => '150',
                'scanmodel_id' => '1',
                'name' => 'Hendrik-Ido-Ambacht',
            ],
            [
                'id' => '151',
                'scanmodel_id' => '1',
                'name' => 'Hengelo (Overijssel)',
            ],
            [
                'id' => '152',
                'scanmodel_id' => '1',
                'name' => 'Den Bosch (&#39;s-Hertogenbosch)',
            ],
            [
                'id' => '153',
                'scanmodel_id' => '1',
                'name' => 'Het Bildt',
            ],
            [
                'id' => '154',
                'scanmodel_id' => '1',
                'name' => 'Heumen',
            ],
            [
                'id' => '155',
                'scanmodel_id' => '1',
                'name' => 'Heusden',
            ],
            [
                'id' => '156',
                'scanmodel_id' => '1',
                'name' => 'Hillegom',
            ],
            [
                'id' => '157',
                'scanmodel_id' => '1',
                'name' => 'Hilvarenbeek',
            ],
            [
                'id' => '158',
                'scanmodel_id' => '1',
                'name' => 'Hilversum',
            ],
            [
                'id' => '159',
                'scanmodel_id' => '1',
                'name' => 'Hof van Twente',
            ],
            [
                'id' => '160',
                'scanmodel_id' => '1',
                'name' => 'Hollands Kroon',
            ],
            [
                'id' => '161',
                'scanmodel_id' => '1',
                'name' => 'Hoogeveen',
            ],
            [
                'id' => '162',
                'scanmodel_id' => '1',
                'name' => 'Hoogezand-Sappemeer',
            ],
            [
                'id' => '163',
                'scanmodel_id' => '1',
                'name' => 'Hoorn',
            ],
            [
                'id' => '164',
                'scanmodel_id' => '1',
                'name' => 'Horst aan de Maas',
            ],
            [
                'id' => '165',
                'scanmodel_id' => '1',
                'name' => 'Houten',
            ],
            [
                'id' => '166',
                'scanmodel_id' => '1',
                'name' => 'Huizen',
            ],
            [
                'id' => '167',
                'scanmodel_id' => '1',
                'name' => 'Hulst',
            ],
            [
                'id' => '168',
                'scanmodel_id' => '1',
                'name' => 'IJsselstein',
            ],
            [
                'id' => '169',
                'scanmodel_id' => '1',
                'name' => 'Kaag en Braassem',
            ],
            [
                'id' => '170',
                'scanmodel_id' => '1',
                'name' => 'Kampen',
            ],
            [
                'id' => '171',
                'scanmodel_id' => '1',
                'name' => 'Kapelle',
            ],
            [
                'id' => '172',
                'scanmodel_id' => '1',
                'name' => 'Katwijk',
            ],
            [
                'id' => '173',
                'scanmodel_id' => '1',
                'name' => 'Kerkrade',
            ],
            [
                'id' => '174',
                'scanmodel_id' => '1',
                'name' => 'Koggenland',
            ],
            [
                'id' => '175',
                'scanmodel_id' => '1',
                'name' => 'Kollumerland en Nieuwkruisland',
            ],
            [
                'id' => '176',
                'scanmodel_id' => '1',
                'name' => 'Korendijk',
            ],
            [
                'id' => '177',
                'scanmodel_id' => '1',
                'name' => 'Krimpen aan den IJssel',
            ],
            [
                'id' => '178',
                'scanmodel_id' => '1',
                'name' => 'Krimpenerwaard',
            ],
            [
                'id' => '179',
                'scanmodel_id' => '1',
                'name' => 'Laarbeek',
            ],
            [
                'id' => '180',
                'scanmodel_id' => '1',
                'name' => 'Landerd',
            ],
            [
                'id' => '181',
                'scanmodel_id' => '1',
                'name' => 'Landgraaf',
            ],
            [
                'id' => '182',
                'scanmodel_id' => '1',
                'name' => 'Landsmeer',
            ],
            [
                'id' => '183',
                'scanmodel_id' => '1',
                'name' => 'Langedijk',
            ],
            [
                'id' => '184',
                'scanmodel_id' => '1',
                'name' => 'Lansingerland',
            ],
            [
                'id' => '185',
                'scanmodel_id' => '1',
                'name' => 'Laren',
            ],
            [
                'id' => '186',
                'scanmodel_id' => '1',
                'name' => 'Leek',
            ],
            [
                'id' => '187',
                'scanmodel_id' => '1',
                'name' => 'Leerdam',
            ],
            [
                'id' => '188',
                'scanmodel_id' => '1',
                'name' => 'Leeuwarden',
            ],
            [
                'id' => '189',
                'scanmodel_id' => '1',
                'name' => 'Leeuwarderadeel',
            ],
            [
                'id' => '190',
                'scanmodel_id' => '1',
                'name' => 'Leiden',
            ],
            [
                'id' => '191',
                'scanmodel_id' => '1',
                'name' => 'Leiderdorp',
            ],
            [
                'id' => '192',
                'scanmodel_id' => '1',
                'name' => 'Leidschendam-Voorburg',
            ],
            [
                'id' => '193',
                'scanmodel_id' => '1',
                'name' => 'Lelystad',
            ],
            [
                'id' => '194',
                'scanmodel_id' => '1',
                'name' => 'Leudal',
            ],
            [
                'id' => '195',
                'scanmodel_id' => '1',
                'name' => 'Leusden',
            ],
            [
                'id' => '196',
                'scanmodel_id' => '1',
                'name' => 'Lingewaal',
            ],
            [
                'id' => '197',
                'scanmodel_id' => '1',
                'name' => 'Lingewaard',
            ],
            [
                'id' => '198',
                'scanmodel_id' => '1',
                'name' => 'Lisse',
            ],
            [
                'id' => '199',
                'scanmodel_id' => '1',
                'name' => 'Littenseradeel',
            ],
            [
                'id' => '200',
                'scanmodel_id' => '1',
                'name' => 'Lochem',
            ],
            [
                'id' => '201',
                'scanmodel_id' => '1',
                'name' => 'Loon op Zand',
            ],
            [
                'id' => '202',
                'scanmodel_id' => '1',
                'name' => 'Lopik',
            ],
            [
                'id' => '203',
                'scanmodel_id' => '1',
                'name' => 'Loppersum',
            ],
            [
                'id' => '204',
                'scanmodel_id' => '1',
                'name' => 'Losser',
            ],
            [
                'id' => '205',
                'scanmodel_id' => '1',
                'name' => 'Maasdriel',
            ],
            [
                'id' => '206',
                'scanmodel_id' => '1',
                'name' => 'Maasgouw',
            ],
            [
                'id' => '207',
                'scanmodel_id' => '1',
                'name' => 'Maassluis',
            ],
            [
                'id' => '208',
                'scanmodel_id' => '1',
                'name' => 'Maastricht',
            ],
            [
                'id' => '209',
                'scanmodel_id' => '1',
                'name' => 'Marum',
            ],
            [
                'id' => '210',
                'scanmodel_id' => '1',
                'name' => 'Medemblik',
            ],
            [
                'id' => '211',
                'scanmodel_id' => '1',
                'name' => 'Meerssen',
            ],
            [
                'id' => '212',
                'scanmodel_id' => '1',
                'name' => 'Meierijstad',
            ],
            [
                'id' => '213',
                'scanmodel_id' => '1',
                'name' => 'Menaldumadeel',
            ],
            [
                'id' => '214',
                'scanmodel_id' => '1',
                'name' => 'Menterwolde',
            ],
            [
                'id' => '215',
                'scanmodel_id' => '1',
                'name' => 'Meppel',
            ],
            [
                'id' => '216',
                'scanmodel_id' => '1',
                'name' => 'Middelburg',
            ],
            [
                'id' => '217',
                'scanmodel_id' => '1',
                'name' => 'Midden-Delfland',
            ],
            [
                'id' => '218',
                'scanmodel_id' => '1',
                'name' => 'Midden-Drenthe',
            ],
            [
                'id' => '219',
                'scanmodel_id' => '1',
                'name' => 'Mill en Sint Hubert',
            ],
            [
                'id' => '220',
                'scanmodel_id' => '1',
                'name' => 'Moerdijk',
            ],
            [
                'id' => '221',
                'scanmodel_id' => '1',
                'name' => 'Molenwaard',
            ],
            [
                'id' => '222',
                'scanmodel_id' => '1',
                'name' => 'Montferland',
            ],
            [
                'id' => '223',
                'scanmodel_id' => '1',
                'name' => 'Montfoort',
            ],
            [
                'id' => '224',
                'scanmodel_id' => '1',
                'name' => 'Mook en Middelaar',
            ],
            [
                'id' => '225',
                'scanmodel_id' => '1',
                'name' => 'Neder-Betuwe',
            ],
            [
                'id' => '226',
                'scanmodel_id' => '1',
                'name' => 'Nederweert',
            ],
            [
                'id' => '227',
                'scanmodel_id' => '1',
                'name' => 'Neerijnen',
            ],
            [
                'id' => '228',
                'scanmodel_id' => '1',
                'name' => 'Nieuwegein',
            ],
            [
                'id' => '229',
                'scanmodel_id' => '1',
                'name' => 'Nieuwkoop',
            ],
            [
                'id' => '230',
                'scanmodel_id' => '1',
                'name' => 'Nijkerk',
            ],
            [
                'id' => '231',
                'scanmodel_id' => '1',
                'name' => 'Nijmegen',
            ],
            [
                'id' => '232',
                'scanmodel_id' => '1',
                'name' => 'Nissewaard',
            ],
            [
                'id' => '233',
                'scanmodel_id' => '1',
                'name' => 'Noord-Beveland',
            ],
            [
                'id' => '234',
                'scanmodel_id' => '1',
                'name' => 'Noordenveld',
            ],
            [
                'id' => '235',
                'scanmodel_id' => '1',
                'name' => 'Noordoostpolder',
            ],
            [
                'id' => '236',
                'scanmodel_id' => '1',
                'name' => 'Noordwijk',
            ],
            [
                'id' => '237',
                'scanmodel_id' => '1',
                'name' => 'Noordwijkerhout',
            ],
            [
                'id' => '238',
                'scanmodel_id' => '1',
                'name' => 'Nuenen, Gerwen en Nederwetten',
            ],
            [
                'id' => '239',
                'scanmodel_id' => '1',
                'name' => 'Nunspeet',
            ],
            [
                'id' => '240',
                'scanmodel_id' => '1',
                'name' => 'Nuth',
            ],
            [
                'id' => '241',
                'scanmodel_id' => '1',
                'name' => 'Oegstgeest',
            ],
            [
                'id' => '242',
                'scanmodel_id' => '1',
                'name' => 'Oirschot',
            ],
            [
                'id' => '243',
                'scanmodel_id' => '1',
                'name' => 'Oisterwijk',
            ],
            [
                'id' => '244',
                'scanmodel_id' => '1',
                'name' => 'Oldambt',
            ],
            [
                'id' => '245',
                'scanmodel_id' => '1',
                'name' => 'Oldebroek',
            ],
            [
                'id' => '246',
                'scanmodel_id' => '1',
                'name' => 'Oldenzaal',
            ],
            [
                'id' => '247',
                'scanmodel_id' => '1',
                'name' => 'Olst-Wijhe',
            ],
            [
                'id' => '248',
                'scanmodel_id' => '1',
                'name' => 'Ommen',
            ],
            [
                'id' => '249',
                'scanmodel_id' => '1',
                'name' => 'Onderbanken',
            ],
            [
                'id' => '250',
                'scanmodel_id' => '1',
                'name' => 'Oost Gelre',
            ],
            [
                'id' => '251',
                'scanmodel_id' => '1',
                'name' => 'Oosterhout',
            ],
            [
                'id' => '252',
                'scanmodel_id' => '1',
                'name' => 'Ooststellingwerf',
            ],
            [
                'id' => '253',
                'scanmodel_id' => '1',
                'name' => 'Oostzaan',
            ],
            [
                'id' => '254',
                'scanmodel_id' => '1',
                'name' => 'Opmeer',
            ],
            [
                'id' => '255',
                'scanmodel_id' => '1',
                'name' => 'Opsterland',
            ],
            [
                'id' => '256',
                'scanmodel_id' => '1',
                'name' => 'Oss',
            ],
            [
                'id' => '257',
                'scanmodel_id' => '1',
                'name' => 'Oud-Beijerland',
            ],
            [
                'id' => '258',
                'scanmodel_id' => '1',
                'name' => 'Oude IJsselstreek',
            ],
            [
                'id' => '259',
                'scanmodel_id' => '1',
                'name' => 'Ouder-Amstel',
            ],
            [
                'id' => '260',
                'scanmodel_id' => '1',
                'name' => 'Oudewater',
            ],
            [
                'id' => '261',
                'scanmodel_id' => '1',
                'name' => 'Overbetuwe',
            ],
            [
                'id' => '262',
                'scanmodel_id' => '1',
                'name' => 'Papendrecht',
            ],
            [
                'id' => '263',
                'scanmodel_id' => '1',
                'name' => 'Peel en Maas',
            ],
            [
                'id' => '264',
                'scanmodel_id' => '1',
                'name' => 'Pekela',
            ],
            [
                'id' => '265',
                'scanmodel_id' => '1',
                'name' => 'Pijnacker-Nootdorp',
            ],
            [
                'id' => '266',
                'scanmodel_id' => '1',
                'name' => 'Purmerend',
            ],
            [
                'id' => '267',
                'scanmodel_id' => '1',
                'name' => 'Putten',
            ],
            [
                'id' => '268',
                'scanmodel_id' => '1',
                'name' => 'Raalte',
            ],
            [
                'id' => '269',
                'scanmodel_id' => '1',
                'name' => 'Reimerswaal',
            ],
            [
                'id' => '270',
                'scanmodel_id' => '1',
                'name' => 'Renkum',
            ],
            [
                'id' => '271',
                'scanmodel_id' => '1',
                'name' => 'Renswoude',
            ],
            [
                'id' => '272',
                'scanmodel_id' => '1',
                'name' => 'Reusel-De Mierden',
            ],
            [
                'id' => '273',
                'scanmodel_id' => '1',
                'name' => 'Rheden',
            ],
            [
                'id' => '274',
                'scanmodel_id' => '1',
                'name' => 'Rhenen',
            ],
            [
                'id' => '275',
                'scanmodel_id' => '1',
                'name' => 'Ridderkerk',
            ],
            [
                'id' => '276',
                'scanmodel_id' => '1',
                'name' => 'Rijnwaarden',
            ],
            [
                'id' => '277',
                'scanmodel_id' => '1',
                'name' => 'Rijssen-Holten',
            ],
            [
                'id' => '278',
                'scanmodel_id' => '1',
                'name' => 'Rijswijk',
            ],
            [
                'id' => '279',
                'scanmodel_id' => '1',
                'name' => 'Roerdalen',
            ],
            [
                'id' => '280',
                'scanmodel_id' => '1',
                'name' => 'Roermond',
            ],
            [
                'id' => '281',
                'scanmodel_id' => '1',
                'name' => 'Roosendaal',
            ],
            [
                'id' => '282',
                'scanmodel_id' => '1',
                'name' => 'Rotterdam',
            ],
            [
                'id' => '283',
                'scanmodel_id' => '1',
                'name' => 'Rozendaal',
            ],
            [
                'id' => '284',
                'scanmodel_id' => '1',
                'name' => 'Rucphen',
            ],
            [
                'id' => '285',
                'scanmodel_id' => '1',
                'name' => 'Saba',
            ],
            [
                'id' => '286',
                'scanmodel_id' => '1',
                'name' => 'Schagen',
            ],
            [
                'id' => '287',
                'scanmodel_id' => '1',
                'name' => 'Scherpenzeel',
            ],
            [
                'id' => '288',
                'scanmodel_id' => '1',
                'name' => 'Schiedam',
            ],
            [
                'id' => '289',
                'scanmodel_id' => '1',
                'name' => 'Schiermonnikoog',
            ],
            [
                'id' => '290',
                'scanmodel_id' => '1',
                'name' => 'Schinnen',
            ],
            [
                'id' => '291',
                'scanmodel_id' => '1',
                'name' => 'Schouwen-Duiveland',
            ],
            [
                'id' => '292',
                'scanmodel_id' => '1',
                'name' => 'Simpelveld',
            ],
            [
                'id' => '293',
                'scanmodel_id' => '1',
                'name' => 'Sint Anthonis',
            ],
            [
                'id' => '294',
                'scanmodel_id' => '1',
                'name' => 'Sint Eustatius',
            ],
            [
                'id' => '295',
                'scanmodel_id' => '1',
                'name' => 'Sint-Michielsgestel',
            ],
            [
                'id' => '296',
                'scanmodel_id' => '1',
                'name' => 'Sittard-Geleen',
            ],
            [
                'id' => '297',
                'scanmodel_id' => '1',
                'name' => 'Sliedrecht',
            ],
            [
                'id' => '298',
                'scanmodel_id' => '1',
                'name' => 'Slochteren',
            ],
            [
                'id' => '299',
                'scanmodel_id' => '1',
                'name' => 'Sluis',
            ],
            [
                'id' => '300',
                'scanmodel_id' => '1',
                'name' => 'Smallingerland',
            ],
            [
                'id' => '301',
                'scanmodel_id' => '1',
                'name' => 'Soest',
            ],
            [
                'id' => '302',
                'scanmodel_id' => '1',
                'name' => 'Someren',
            ],
            [
                'id' => '303',
                'scanmodel_id' => '1',
                'name' => 'Son en Breugel',
            ],
            [
                'id' => '304',
                'scanmodel_id' => '1',
                'name' => 'Stadskanaal',
            ],
            [
                'id' => '305',
                'scanmodel_id' => '1',
                'name' => 'Staphorst',
            ],
            [
                'id' => '306',
                'scanmodel_id' => '1',
                'name' => 'Stede Broec',
            ],
            [
                'id' => '307',
                'scanmodel_id' => '1',
                'name' => 'Steenbergen',
            ],
            [
                'id' => '308',
                'scanmodel_id' => '1',
                'name' => 'Steenwijkerland',
            ],
            [
                'id' => '309',
                'scanmodel_id' => '1',
                'name' => 'Stein',
            ],
            [
                'id' => '310',
                'scanmodel_id' => '1',
                'name' => 'Stichtse Vecht',
            ],
            [
                'id' => '311',
                'scanmodel_id' => '1',
                'name' => 'Strijen',
            ],
            [
                'id' => '312',
                'scanmodel_id' => '1',
                'name' => 'Súdwest-Fryslân',
            ],
            [
                'id' => '313',
                'scanmodel_id' => '1',
                'name' => 'Ten Boer',
            ],
            [
                'id' => '314',
                'scanmodel_id' => '1',
                'name' => 'Terneuzen',
            ],
            [
                'id' => '315',
                'scanmodel_id' => '1',
                'name' => 'Terschelling',
            ],
            [
                'id' => '316',
                'scanmodel_id' => '1',
                'name' => 'Texel',
            ],
            [
                'id' => '317',
                'scanmodel_id' => '1',
                'name' => 'Teylingen',
            ],
            [
                'id' => '318',
                'scanmodel_id' => '1',
                'name' => 'Tholen',
            ],
            [
                'id' => '319',
                'scanmodel_id' => '1',
                'name' => 'Tiel',
            ],
            [
                'id' => '320',
                'scanmodel_id' => '1',
                'name' => 'Tietjerksteradeel',
            ],
            [
                'id' => '321',
                'scanmodel_id' => '1',
                'name' => 'Tilburg',
            ],
            [
                'id' => '322',
                'scanmodel_id' => '1',
                'name' => 'Tubbergen',
            ],
            [
                'id' => '323',
                'scanmodel_id' => '1',
                'name' => 'Twenterand',
            ],
            [
                'id' => '324',
                'scanmodel_id' => '1',
                'name' => 'Tynaarlo',
            ],
            [
                'id' => '325',
                'scanmodel_id' => '1',
                'name' => 'Uden',
            ],
            [
                'id' => '326',
                'scanmodel_id' => '1',
                'name' => 'Uitgeest',
            ],
            [
                'id' => '327',
                'scanmodel_id' => '1',
                'name' => 'Uithoorn',
            ],
            [
                'id' => '328',
                'scanmodel_id' => '1',
                'name' => 'Urk',
            ],
            [
                'id' => '329',
                'scanmodel_id' => '1',
                'name' => 'Utrecht',
            ],
            [
                'id' => '330',
                'scanmodel_id' => '1',
                'name' => 'Utrechtse Heuvelrug',
            ],
            [
                'id' => '331',
                'scanmodel_id' => '1',
                'name' => 'Vaals',
            ],
            [
                'id' => '332',
                'scanmodel_id' => '1',
                'name' => 'Valkenburg aan de Geul',
            ],
            [
                'id' => '333',
                'scanmodel_id' => '1',
                'name' => 'Valkenswaard',
            ],
            [
                'id' => '334',
                'scanmodel_id' => '1',
                'name' => 'Veendam',
            ],
            [
                'id' => '335',
                'scanmodel_id' => '1',
                'name' => 'Veenendaal',
            ],
            [
                'id' => '336',
                'scanmodel_id' => '1',
                'name' => 'Veere',
            ],
            [
                'id' => '337',
                'scanmodel_id' => '1',
                'name' => 'Veldhoven',
            ],
            [
                'id' => '338',
                'scanmodel_id' => '1',
                'name' => 'Velsen',
            ],
            [
                'id' => '339',
                'scanmodel_id' => '1',
                'name' => 'Venlo',
            ],
            [
                'id' => '340',
                'scanmodel_id' => '1',
                'name' => 'Venray',
            ],
            [
                'id' => '341',
                'scanmodel_id' => '1',
                'name' => 'Vianen',
            ],
            [
                'id' => '342',
                'scanmodel_id' => '1',
                'name' => 'Vlaardingen',
            ],
            [
                'id' => '343',
                'scanmodel_id' => '1',
                'name' => 'Vlagtwedde',
            ],
            [
                'id' => '344',
                'scanmodel_id' => '1',
                'name' => 'Vlieland',
            ],
            [
                'id' => '345',
                'scanmodel_id' => '1',
                'name' => 'Vlissingen',
            ],
            [
                'id' => '346',
                'scanmodel_id' => '1',
                'name' => 'Voerendaal',
            ],
            [
                'id' => '347',
                'scanmodel_id' => '1',
                'name' => 'Voorschoten',
            ],
            [
                'id' => '348',
                'scanmodel_id' => '1',
                'name' => 'Voorst',
            ],
            [
                'id' => '349',
                'scanmodel_id' => '1',
                'name' => 'Vught',
            ],
            [
                'id' => '350',
                'scanmodel_id' => '1',
                'name' => 'Waalre',
            ],
            [
                'id' => '351',
                'scanmodel_id' => '1',
                'name' => 'Waalwijk',
            ],
            [
                'id' => '352',
                'scanmodel_id' => '1',
                'name' => 'Waddinxveen',
            ],
            [
                'id' => '353',
                'scanmodel_id' => '1',
                'name' => 'Wageningen',
            ],
            [
                'id' => '354',
                'scanmodel_id' => '1',
                'name' => 'Wassenaar',
            ],
            [
                'id' => '355',
                'scanmodel_id' => '1',
                'name' => 'Waterland',
            ],
            [
                'id' => '356',
                'scanmodel_id' => '1',
                'name' => 'Weert',
            ],
            [
                'id' => '357',
                'scanmodel_id' => '1',
                'name' => 'Weesp',
            ],
            [
                'id' => '358',
                'scanmodel_id' => '1',
                'name' => 'Werkendam',
            ],
            [
                'id' => '359',
                'scanmodel_id' => '1',
                'name' => 'West Maas en Waal',
            ],
            [
                'id' => '360',
                'scanmodel_id' => '1',
                'name' => 'Westerveld',
            ],
            [
                'id' => '361',
                'scanmodel_id' => '1',
                'name' => 'Westervoort',
            ],
            [
                'id' => '362',
                'scanmodel_id' => '1',
                'name' => 'Westland',
            ],
            [
                'id' => '363',
                'scanmodel_id' => '1',
                'name' => 'Weststellingwerf',
            ],
            [
                'id' => '364',
                'scanmodel_id' => '1',
                'name' => 'Westvoorne',
            ],
            [
                'id' => '365',
                'scanmodel_id' => '1',
                'name' => 'Wierden',
            ],
            [
                'id' => '366',
                'scanmodel_id' => '1',
                'name' => 'Wijchen',
            ],
            [
                'id' => '367',
                'scanmodel_id' => '1',
                'name' => 'Wijdemeren',
            ],
            [
                'id' => '368',
                'scanmodel_id' => '1',
                'name' => 'Wijk bij Duurstede',
            ],
            [
                'id' => '369',
                'scanmodel_id' => '1',
                'name' => 'Winsum',
            ],
            [
                'id' => '370',
                'scanmodel_id' => '1',
                'name' => 'Winterswijk',
            ],
            [
                'id' => '371',
                'scanmodel_id' => '1',
                'name' => 'Woensdrecht',
            ],
            [
                'id' => '372',
                'scanmodel_id' => '1',
                'name' => 'Woerden',
            ],
            [
                'id' => '373',
                'scanmodel_id' => '1',
                'name' => 'Wormerland',
            ],
            [
                'id' => '374',
                'scanmodel_id' => '1',
                'name' => 'Woudenberg',
            ],
            [
                'id' => '375',
                'scanmodel_id' => '1',
                'name' => 'Woudrichem',
            ],
            [
                'id' => '376',
                'scanmodel_id' => '1',
                'name' => 'Zaanstad',
            ],
            [
                'id' => '377',
                'scanmodel_id' => '1',
                'name' => 'Zaltbommel',
            ],
            [
                'id' => '378',
                'scanmodel_id' => '1',
                'name' => 'Zandvoort',
            ],
            [
                'id' => '379',
                'scanmodel_id' => '1',
                'name' => 'Zederik',
            ],
            [
                'id' => '380',
                'scanmodel_id' => '1',
                'name' => 'Zeewolde',
            ],
            [
                'id' => '381',
                'scanmodel_id' => '1',
                'name' => 'Zeist',
            ],
            [
                'id' => '382',
                'scanmodel_id' => '1',
                'name' => 'Zevenaar',
            ],
            [
                'id' => '383',
                'scanmodel_id' => '1',
                'name' => 'Zoetermeer',
            ],
            [
                'id' => '384',
                'scanmodel_id' => '1',
                'name' => 'Zoeterwoude',
            ],
            [
                'id' => '385',
                'scanmodel_id' => '1',
                'name' => 'Zuidhorn',
            ],
            [
                'id' => '386',
                'scanmodel_id' => '1',
                'name' => 'Zuidplas',
            ],
            [
                'id' => '387',
                'scanmodel_id' => '1',
                'name' => 'Zundert',
            ],
            [
                'id' => '388',
                'scanmodel_id' => '1',
                'name' => 'Zutphen',
            ],
            [
                'id' => '389',
                'scanmodel_id' => '1',
                'name' => 'Zwartewaterland',
            ],
            [
                'id' => '390',
                'scanmodel_id' => '1',
                'name' => 'Zwijndrecht',
            ],
            [
                'id' => '391',
                'scanmodel_id' => '1',
                'name' => 'Zwolle',
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}

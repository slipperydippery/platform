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
                'title' => 'Aa en Hunze',
            ],
            [
                'id' => '2',
                'scanmodel_id' => '1',
                'title' => 'Aalburg',
            ],
            [
                'id' => '3',
                'scanmodel_id' => '1',
                'title' => 'Aalsmeer',
            ],
            [
                'id' => '4',
                'scanmodel_id' => '1',
                'title' => 'Aalten',
            ],
            [
                'id' => '5',
                'scanmodel_id' => '1',
                'title' => 'Achtkarspelen',
            ],
            [
                'id' => '6',
                'scanmodel_id' => '1',
                'title' => 'Alblasserdam',
            ],
            [
                'id' => '7',
                'scanmodel_id' => '1',
                'title' => 'Albrandswaard',
            ],
            [
                'id' => '8',
                'scanmodel_id' => '1',
                'title' => 'Alkmaar',
            ],
            [
                'id' => '9',
                'scanmodel_id' => '1',
                'title' => 'Almelo',
            ],
            [
                'id' => '10',
                'scanmodel_id' => '1',
                'title' => 'Almere',
            ],
            [
                'id' => '11',
                'scanmodel_id' => '1',
                'title' => 'Alphen aan den Rijn',
            ],
            [
                'id' => '12',
                'scanmodel_id' => '1',
                'title' => 'Alphen-Chaam',
            ],
            [
                'id' => '13',
                'scanmodel_id' => '1',
                'title' => 'Ameland',
            ],
            [
                'id' => '14',
                'scanmodel_id' => '1',
                'title' => 'Amersfoort',
            ],
            [
                'id' => '15',
                'scanmodel_id' => '1',
                'title' => 'Amstelveen',
            ],
            [
                'id' => '16',
                'scanmodel_id' => '1',
                'title' => 'Amsterdam',
            ],
            [
                'id' => '17',
                'scanmodel_id' => '1',
                'title' => 'Apeldoorn',
            ],
            [
                'id' => '18',
                'scanmodel_id' => '1',
                'title' => 'Appingedam',
            ],
            [
                'id' => '19',
                'scanmodel_id' => '1',
                'title' => 'Arnhem',
            ],
            [
                'id' => '20',
                'scanmodel_id' => '1',
                'title' => 'Assen',
            ],
            [
                'id' => '21',
                'scanmodel_id' => '1',
                'title' => 'Asten',
            ],
            [
                'id' => '22',
                'scanmodel_id' => '1',
                'title' => 'Baarle-Nassau',
            ],
            [
                'id' => '23',
                'scanmodel_id' => '1',
                'title' => 'Baarn',
            ],
            [
                'id' => '24',
                'scanmodel_id' => '1',
                'title' => 'Barendrecht',
            ],
            [
                'id' => '25',
                'scanmodel_id' => '1',
                'title' => 'Barneveld',
            ],
            [
                'id' => '26',
                'scanmodel_id' => '1',
                'title' => 'Bedum',
            ],
            [
                'id' => '27',
                'scanmodel_id' => '1',
                'title' => 'Beek',
            ],
            [
                'id' => '28',
                'scanmodel_id' => '1',
                'title' => 'Beemster',
            ],
            [
                'id' => '29',
                'scanmodel_id' => '1',
                'title' => 'Beesel',
            ],
            [
                'id' => '30',
                'scanmodel_id' => '1',
                'title' => 'Bellingwedde',
            ],
            [
                'id' => '31',
                'scanmodel_id' => '1',
                'title' => 'Berg en Dal',
            ],
            [
                'id' => '32',
                'scanmodel_id' => '1',
                'title' => 'Bergeijk',
            ],
            [
                'id' => '33',
                'scanmodel_id' => '1',
                'title' => 'Bergen (Limburg)',
            ],
            [
                'id' => '34',
                'scanmodel_id' => '1',
                'title' => 'Bergen (Noord-Holland)',
            ],
            [
                'id' => '35',
                'scanmodel_id' => '1',
                'title' => 'Bergen op Zoom',
            ],
            [
                'id' => '36',
                'scanmodel_id' => '1',
                'title' => 'Berkelland',
            ],
            [
                'id' => '37',
                'scanmodel_id' => '1',
                'title' => 'Bernheze',
            ],
            [
                'id' => '38',
                'scanmodel_id' => '1',
                'title' => 'Best',
            ],
            [
                'id' => '39',
                'scanmodel_id' => '1',
                'title' => 'Beuningen',
            ],
            [
                'id' => '40',
                'scanmodel_id' => '1',
                'title' => 'Beverwijk',
            ],
            [
                'id' => '41',
                'scanmodel_id' => '1',
                'title' => 'Binnenmaas',
            ],
            [
                'id' => '42',
                'scanmodel_id' => '1',
                'title' => 'Bladel',
            ],
            [
                'id' => '43',
                'scanmodel_id' => '1',
                'title' => 'Blaricum',
            ],
            [
                'id' => '44',
                'scanmodel_id' => '1',
                'title' => 'Bloemendaal',
            ],
            [
                'id' => '45',
                'scanmodel_id' => '1',
                'title' => 'Bodegraven-Reeuwijk',
            ],
            [
                'id' => '46',
                'scanmodel_id' => '1',
                'title' => 'Boekel',
            ],
            [
                'id' => '47',
                'scanmodel_id' => '1',
                'title' => 'Bonaire',
            ],
            [
                'id' => '48',
                'scanmodel_id' => '1',
                'title' => 'Borger-Odoorn',
            ],
            [
                'id' => '49',
                'scanmodel_id' => '1',
                'title' => 'Borne',
            ],
            [
                'id' => '50',
                'scanmodel_id' => '1',
                'title' => 'Borsele',
            ],
            [
                'id' => '51',
                'scanmodel_id' => '1',
                'title' => 'Boxmeer',
            ],
            [
                'id' => '52',
                'scanmodel_id' => '1',
                'title' => 'Boxtel',
            ],
            [
                'id' => '53',
                'scanmodel_id' => '1',
                'title' => 'Breda',
            ],
            [
                'id' => '54',
                'scanmodel_id' => '1',
                'title' => 'Brielle',
            ],
            [
                'id' => '55',
                'scanmodel_id' => '1',
                'title' => 'Bronckhorst',
            ],
            [
                'id' => '56',
                'scanmodel_id' => '1',
                'title' => 'Brummen',
            ],
            [
                'id' => '57',
                'scanmodel_id' => '1',
                'title' => 'Brunssum',
            ],
            [
                'id' => '58',
                'scanmodel_id' => '1',
                'title' => 'Bunnik',
            ],
            [
                'id' => '59',
                'scanmodel_id' => '1',
                'title' => 'Bunschoten',
            ],
            [
                'id' => '60',
                'scanmodel_id' => '1',
                'title' => 'Buren',
            ],
            [
                'id' => '61',
                'scanmodel_id' => '1',
                'title' => 'Capelle aan den IJssel',
            ],
            [
                'id' => '62',
                'scanmodel_id' => '1',
                'title' => 'Castricum',
            ],
            [
                'id' => '63',
                'scanmodel_id' => '1',
                'title' => 'Coevorden',
            ],
            [
                'id' => '64',
                'scanmodel_id' => '1',
                'title' => 'Cranendonck',
            ],
            [
                'id' => '65',
                'scanmodel_id' => '1',
                'title' => 'Cromstrijen',
            ],
            [
                'id' => '66',
                'scanmodel_id' => '1',
                'title' => 'Cuijk',
            ],
            [
                'id' => '67',
                'scanmodel_id' => '1',
                'title' => 'Culemborg',
            ],
            [
                'id' => '68',
                'scanmodel_id' => '1',
                'title' => 'Dalfsen',
            ],
            [
                'id' => '69',
                'scanmodel_id' => '1',
                'title' => 'Dantumadeel',
            ],
            [
                'id' => '70',
                'scanmodel_id' => '1',
                'title' => 'De Bilt',
            ],
            [
                'id' => '71',
                'scanmodel_id' => '1',
                'title' => 'De Friese Meren',
            ],
            [
                'id' => '72',
                'scanmodel_id' => '1',
                'title' => 'De Marne',
            ],
            [
                'id' => '73',
                'scanmodel_id' => '1',
                'title' => 'De Ronde Venen',
            ],
            [
                'id' => '74',
                'scanmodel_id' => '1',
                'title' => 'De Wolden',
            ],
            [
                'id' => '75',
                'scanmodel_id' => '1',
                'title' => 'Delft',
            ],
            [
                'id' => '76',
                'scanmodel_id' => '1',
                'title' => 'Delfzijl',
            ],
            [
                'id' => '77',
                'scanmodel_id' => '1',
                'title' => 'Den Haag (&#39;s-Gravenhage)',
            ],
            [
                'id' => '78',
                'scanmodel_id' => '1',
                'title' => 'Den Helder',
            ],
            [
                'id' => '79',
                'scanmodel_id' => '1',
                'title' => 'Deurne',
            ],
            [
                'id' => '80',
                'scanmodel_id' => '1',
                'title' => 'Deventer',
            ],
            [
                'id' => '81',
                'scanmodel_id' => '1',
                'title' => 'Diemen',
            ],
            [
                'id' => '82',
                'scanmodel_id' => '1',
                'title' => 'Dinkelland',
            ],
            [
                'id' => '83',
                'scanmodel_id' => '1',
                'title' => 'Doesburg',
            ],
            [
                'id' => '84',
                'scanmodel_id' => '1',
                'title' => 'Doetinchem',
            ],
            [
                'id' => '85',
                'scanmodel_id' => '1',
                'title' => 'Dongen',
            ],
            [
                'id' => '86',
                'scanmodel_id' => '1',
                'title' => 'Dongeradeel',
            ],
            [
                'id' => '87',
                'scanmodel_id' => '1',
                'title' => 'Dordrecht',
            ],
            [
                'id' => '88',
                'scanmodel_id' => '1',
                'title' => 'Drechterland',
            ],
            [
                'id' => '89',
                'scanmodel_id' => '1',
                'title' => 'Drimmelen',
            ],
            [
                'id' => '90',
                'scanmodel_id' => '1',
                'title' => 'Dronten',
            ],
            [
                'id' => '91',
                'scanmodel_id' => '1',
                'title' => 'Druten',
            ],
            [
                'id' => '92',
                'scanmodel_id' => '1',
                'title' => 'Duiven',
            ],
            [
                'id' => '93',
                'scanmodel_id' => '1',
                'title' => 'Echt-Susteren',
            ],
            [
                'id' => '94',
                'scanmodel_id' => '1',
                'title' => 'Edam-Volendam',
            ],
            [
                'id' => '95',
                'scanmodel_id' => '1',
                'title' => 'Ede',
            ],
            [
                'id' => '96',
                'scanmodel_id' => '1',
                'title' => 'Eemnes',
            ],
            [
                'id' => '97',
                'scanmodel_id' => '1',
                'title' => 'Eemsmond',
            ],
            [
                'id' => '98',
                'scanmodel_id' => '1',
                'title' => 'Eersel',
            ],
            [
                'id' => '99',
                'scanmodel_id' => '1',
                'title' => 'Eijsden-Margraten',
            ],
            [
                'id' => '100',
                'scanmodel_id' => '1',
                'title' => 'Eindhoven',
            ],
            [
                'id' => '101',
                'scanmodel_id' => '1',
                'title' => 'Elburg',
            ],
            [
                'id' => '102',
                'scanmodel_id' => '1',
                'title' => 'Emmen',
            ],
            [
                'id' => '103',
                'scanmodel_id' => '1',
                'title' => 'Enkhuizen',
            ],
            [
                'id' => '104',
                'scanmodel_id' => '1',
                'title' => 'Enschede',
            ],
            [
                'id' => '105',
                'scanmodel_id' => '1',
                'title' => 'Epe',
            ],
            [
                'id' => '106',
                'scanmodel_id' => '1',
                'title' => 'Ermelo',
            ],
            [
                'id' => '107',
                'scanmodel_id' => '1',
                'title' => 'Etten-Leur',
            ],
            [
                'id' => '108',
                'scanmodel_id' => '1',
                'title' => 'Ferwerderadeel',
            ],
            [
                'id' => '109',
                'scanmodel_id' => '1',
                'title' => 'Franekeradeel',
            ],
            [
                'id' => '110',
                'scanmodel_id' => '1',
                'title' => 'Geertruidenberg',
            ],
            [
                'id' => '111',
                'scanmodel_id' => '1',
                'title' => 'Geldermalsen',
            ],
            [
                'id' => '112',
                'scanmodel_id' => '1',
                'title' => 'Geldrop-Mierlo',
            ],
            [
                'id' => '113',
                'scanmodel_id' => '1',
                'title' => 'Gemert-Bakel',
            ],
            [
                'id' => '114',
                'scanmodel_id' => '1',
                'title' => 'Gennep',
            ],
            [
                'id' => '115',
                'scanmodel_id' => '1',
                'title' => 'Giessenlanden',
            ],
            [
                'id' => '116',
                'scanmodel_id' => '1',
                'title' => 'Gilze en Rijen',
            ],
            [
                'id' => '117',
                'scanmodel_id' => '1',
                'title' => 'Goeree-Overflakkee',
            ],
            [
                'id' => '118',
                'scanmodel_id' => '1',
                'title' => 'Goes',
            ],
            [
                'id' => '119',
                'scanmodel_id' => '1',
                'title' => 'Goirle',
            ],
            [
                'id' => '120',
                'scanmodel_id' => '1',
                'title' => 'Gooise Meren',
            ],
            [
                'id' => '121',
                'scanmodel_id' => '1',
                'title' => 'Gorinchem (Gorcum of Gorkum)',
            ],
            [
                'id' => '122',
                'scanmodel_id' => '1',
                'title' => 'Gouda',
            ],
            [
                'id' => '123',
                'scanmodel_id' => '1',
                'title' => 'Grave',
            ],
            [
                'id' => '124',
                'scanmodel_id' => '1',
                'title' => 'Groningen',
            ],
            [
                'id' => '125',
                'scanmodel_id' => '1',
                'title' => 'Grootegast',
            ],
            [
                'id' => '126',
                'scanmodel_id' => '1',
                'title' => 'Gulpen-Wittem',
            ],
            [
                'id' => '127',
                'scanmodel_id' => '1',
                'title' => 'Haaksbergen',
            ],
            [
                'id' => '128',
                'scanmodel_id' => '1',
                'title' => 'Haaren',
            ],
            [
                'id' => '129',
                'scanmodel_id' => '1',
                'title' => 'Haarlem',
            ],
            [
                'id' => '130',
                'scanmodel_id' => '1',
                'title' => 'Haarlemmerliede en Spaarnwoude',
            ],
            [
                'id' => '131',
                'scanmodel_id' => '1',
                'title' => 'Haarlemmermeer',
            ],
            [
                'id' => '132',
                'scanmodel_id' => '1',
                'title' => 'Halderberge',
            ],
            [
                'id' => '133',
                'scanmodel_id' => '1',
                'title' => 'Hardenberg',
            ],
            [
                'id' => '134',
                'scanmodel_id' => '1',
                'title' => 'Harderwijk',
            ],
            [
                'id' => '135',
                'scanmodel_id' => '1',
                'title' => 'Hardinxveld-Giessendam',
            ],
            [
                'id' => '136',
                'scanmodel_id' => '1',
                'title' => 'Haren',
            ],
            [
                'id' => '137',
                'scanmodel_id' => '1',
                'title' => 'Harlingen',
            ],
            [
                'id' => '138',
                'scanmodel_id' => '1',
                'title' => 'Hattem',
            ],
            [
                'id' => '139',
                'scanmodel_id' => '1',
                'title' => 'Heemskerk',
            ],
            [
                'id' => '140',
                'scanmodel_id' => '1',
                'title' => 'Heemstede',
            ],
            [
                'id' => '141',
                'scanmodel_id' => '1',
                'title' => 'Heerde',
            ],
            [
                'id' => '142',
                'scanmodel_id' => '1',
                'title' => 'Heerenveen',
            ],
            [
                'id' => '143',
                'scanmodel_id' => '1',
                'title' => 'Heerhugowaard',
            ],
            [
                'id' => '144',
                'scanmodel_id' => '1',
                'title' => 'Heerlen',
            ],
            [
                'id' => '145',
                'scanmodel_id' => '1',
                'title' => 'Heeze-Leende',
            ],
            [
                'id' => '146',
                'scanmodel_id' => '1',
                'title' => 'Heiloo',
            ],
            [
                'id' => '147',
                'scanmodel_id' => '1',
                'title' => 'Hellendoorn',
            ],
            [
                'id' => '148',
                'scanmodel_id' => '1',
                'title' => 'Hellevoetsluis',
            ],
            [
                'id' => '149',
                'scanmodel_id' => '1',
                'title' => 'Helmond',
            ],
            [
                'id' => '150',
                'scanmodel_id' => '1',
                'title' => 'Hendrik-Ido-Ambacht',
            ],
            [
                'id' => '151',
                'scanmodel_id' => '1',
                'title' => 'Hengelo (Overijssel)',
            ],
            [
                'id' => '152',
                'scanmodel_id' => '1',
                'title' => 'Den Bosch (&#39;s-Hertogenbosch)',
            ],
            [
                'id' => '153',
                'scanmodel_id' => '1',
                'title' => 'Het Bildt',
            ],
            [
                'id' => '154',
                'scanmodel_id' => '1',
                'title' => 'Heumen',
            ],
            [
                'id' => '155',
                'scanmodel_id' => '1',
                'title' => 'Heusden',
            ],
            [
                'id' => '156',
                'scanmodel_id' => '1',
                'title' => 'Hillegom',
            ],
            [
                'id' => '157',
                'scanmodel_id' => '1',
                'title' => 'Hilvarenbeek',
            ],
            [
                'id' => '158',
                'scanmodel_id' => '1',
                'title' => 'Hilversum',
            ],
            [
                'id' => '159',
                'scanmodel_id' => '1',
                'title' => 'Hof van Twente',
            ],
            [
                'id' => '160',
                'scanmodel_id' => '1',
                'title' => 'Hollands Kroon',
            ],
            [
                'id' => '161',
                'scanmodel_id' => '1',
                'title' => 'Hoogeveen',
            ],
            [
                'id' => '162',
                'scanmodel_id' => '1',
                'title' => 'Hoogezand-Sappemeer',
            ],
            [
                'id' => '163',
                'scanmodel_id' => '1',
                'title' => 'Hoorn',
            ],
            [
                'id' => '164',
                'scanmodel_id' => '1',
                'title' => 'Horst aan de Maas',
            ],
            [
                'id' => '165',
                'scanmodel_id' => '1',
                'title' => 'Houten',
            ],
            [
                'id' => '166',
                'scanmodel_id' => '1',
                'title' => 'Huizen',
            ],
            [
                'id' => '167',
                'scanmodel_id' => '1',
                'title' => 'Hulst',
            ],
            [
                'id' => '168',
                'scanmodel_id' => '1',
                'title' => 'IJsselstein',
            ],
            [
                'id' => '169',
                'scanmodel_id' => '1',
                'title' => 'Kaag en Braassem',
            ],
            [
                'id' => '170',
                'scanmodel_id' => '1',
                'title' => 'Kampen',
            ],
            [
                'id' => '171',
                'scanmodel_id' => '1',
                'title' => 'Kapelle',
            ],
            [
                'id' => '172',
                'scanmodel_id' => '1',
                'title' => 'Katwijk',
            ],
            [
                'id' => '173',
                'scanmodel_id' => '1',
                'title' => 'Kerkrade',
            ],
            [
                'id' => '174',
                'scanmodel_id' => '1',
                'title' => 'Koggenland',
            ],
            [
                'id' => '175',
                'scanmodel_id' => '1',
                'title' => 'Kollumerland en Nieuwkruisland',
            ],
            [
                'id' => '176',
                'scanmodel_id' => '1',
                'title' => 'Korendijk',
            ],
            [
                'id' => '177',
                'scanmodel_id' => '1',
                'title' => 'Krimpen aan den IJssel',
            ],
            [
                'id' => '178',
                'scanmodel_id' => '1',
                'title' => 'Krimpenerwaard',
            ],
            [
                'id' => '179',
                'scanmodel_id' => '1',
                'title' => 'Laarbeek',
            ],
            [
                'id' => '180',
                'scanmodel_id' => '1',
                'title' => 'Landerd',
            ],
            [
                'id' => '181',
                'scanmodel_id' => '1',
                'title' => 'Landgraaf',
            ],
            [
                'id' => '182',
                'scanmodel_id' => '1',
                'title' => 'Landsmeer',
            ],
            [
                'id' => '183',
                'scanmodel_id' => '1',
                'title' => 'Langedijk',
            ],
            [
                'id' => '184',
                'scanmodel_id' => '1',
                'title' => 'Lansingerland',
            ],
            [
                'id' => '185',
                'scanmodel_id' => '1',
                'title' => 'Laren',
            ],
            [
                'id' => '186',
                'scanmodel_id' => '1',
                'title' => 'Leek',
            ],
            [
                'id' => '187',
                'scanmodel_id' => '1',
                'title' => 'Leerdam',
            ],
            [
                'id' => '188',
                'scanmodel_id' => '1',
                'title' => 'Leeuwarden',
            ],
            [
                'id' => '189',
                'scanmodel_id' => '1',
                'title' => 'Leeuwarderadeel',
            ],
            [
                'id' => '190',
                'scanmodel_id' => '1',
                'title' => 'Leiden',
            ],
            [
                'id' => '191',
                'scanmodel_id' => '1',
                'title' => 'Leiderdorp',
            ],
            [
                'id' => '192',
                'scanmodel_id' => '1',
                'title' => 'Leidschendam-Voorburg',
            ],
            [
                'id' => '193',
                'scanmodel_id' => '1',
                'title' => 'Lelystad',
            ],
            [
                'id' => '194',
                'scanmodel_id' => '1',
                'title' => 'Leudal',
            ],
            [
                'id' => '195',
                'scanmodel_id' => '1',
                'title' => 'Leusden',
            ],
            [
                'id' => '196',
                'scanmodel_id' => '1',
                'title' => 'Lingewaal',
            ],
            [
                'id' => '197',
                'scanmodel_id' => '1',
                'title' => 'Lingewaard',
            ],
            [
                'id' => '198',
                'scanmodel_id' => '1',
                'title' => 'Lisse',
            ],
            [
                'id' => '199',
                'scanmodel_id' => '1',
                'title' => 'Littenseradeel',
            ],
            [
                'id' => '200',
                'scanmodel_id' => '1',
                'title' => 'Lochem',
            ],
            [
                'id' => '201',
                'scanmodel_id' => '1',
                'title' => 'Loon op Zand',
            ],
            [
                'id' => '202',
                'scanmodel_id' => '1',
                'title' => 'Lopik',
            ],
            [
                'id' => '203',
                'scanmodel_id' => '1',
                'title' => 'Loppersum',
            ],
            [
                'id' => '204',
                'scanmodel_id' => '1',
                'title' => 'Losser',
            ],
            [
                'id' => '205',
                'scanmodel_id' => '1',
                'title' => 'Maasdriel',
            ],
            [
                'id' => '206',
                'scanmodel_id' => '1',
                'title' => 'Maasgouw',
            ],
            [
                'id' => '207',
                'scanmodel_id' => '1',
                'title' => 'Maassluis',
            ],
            [
                'id' => '208',
                'scanmodel_id' => '1',
                'title' => 'Maastricht',
            ],
            [
                'id' => '209',
                'scanmodel_id' => '1',
                'title' => 'Marum',
            ],
            [
                'id' => '210',
                'scanmodel_id' => '1',
                'title' => 'Medemblik',
            ],
            [
                'id' => '211',
                'scanmodel_id' => '1',
                'title' => 'Meerssen',
            ],
            [
                'id' => '212',
                'scanmodel_id' => '1',
                'title' => 'Meierijstad',
            ],
            [
                'id' => '213',
                'scanmodel_id' => '1',
                'title' => 'Menaldumadeel',
            ],
            [
                'id' => '214',
                'scanmodel_id' => '1',
                'title' => 'Menterwolde',
            ],
            [
                'id' => '215',
                'scanmodel_id' => '1',
                'title' => 'Meppel',
            ],
            [
                'id' => '216',
                'scanmodel_id' => '1',
                'title' => 'Middelburg',
            ],
            [
                'id' => '217',
                'scanmodel_id' => '1',
                'title' => 'Midden-Delfland',
            ],
            [
                'id' => '218',
                'scanmodel_id' => '1',
                'title' => 'Midden-Drenthe',
            ],
            [
                'id' => '219',
                'scanmodel_id' => '1',
                'title' => 'Mill en Sint Hubert',
            ],
            [
                'id' => '220',
                'scanmodel_id' => '1',
                'title' => 'Moerdijk',
            ],
            [
                'id' => '221',
                'scanmodel_id' => '1',
                'title' => 'Molenwaard',
            ],
            [
                'id' => '222',
                'scanmodel_id' => '1',
                'title' => 'Montferland',
            ],
            [
                'id' => '223',
                'scanmodel_id' => '1',
                'title' => 'Montfoort',
            ],
            [
                'id' => '224',
                'scanmodel_id' => '1',
                'title' => 'Mook en Middelaar',
            ],
            [
                'id' => '225',
                'scanmodel_id' => '1',
                'title' => 'Neder-Betuwe',
            ],
            [
                'id' => '226',
                'scanmodel_id' => '1',
                'title' => 'Nederweert',
            ],
            [
                'id' => '227',
                'scanmodel_id' => '1',
                'title' => 'Neerijnen',
            ],
            [
                'id' => '228',
                'scanmodel_id' => '1',
                'title' => 'Nieuwegein',
            ],
            [
                'id' => '229',
                'scanmodel_id' => '1',
                'title' => 'Nieuwkoop',
            ],
            [
                'id' => '230',
                'scanmodel_id' => '1',
                'title' => 'Nijkerk',
            ],
            [
                'id' => '231',
                'scanmodel_id' => '1',
                'title' => 'Nijmegen',
            ],
            [
                'id' => '232',
                'scanmodel_id' => '1',
                'title' => 'Nissewaard',
            ],
            [
                'id' => '233',
                'scanmodel_id' => '1',
                'title' => 'Noord-Beveland',
            ],
            [
                'id' => '234',
                'scanmodel_id' => '1',
                'title' => 'Noordenveld',
            ],
            [
                'id' => '235',
                'scanmodel_id' => '1',
                'title' => 'Noordoostpolder',
            ],
            [
                'id' => '236',
                'scanmodel_id' => '1',
                'title' => 'Noordwijk',
            ],
            [
                'id' => '237',
                'scanmodel_id' => '1',
                'title' => 'Noordwijkerhout',
            ],
            [
                'id' => '238',
                'scanmodel_id' => '1',
                'title' => 'Nuenen, Gerwen en Nederwetten',
            ],
            [
                'id' => '239',
                'scanmodel_id' => '1',
                'title' => 'Nunspeet',
            ],
            [
                'id' => '240',
                'scanmodel_id' => '1',
                'title' => 'Nuth',
            ],
            [
                'id' => '241',
                'scanmodel_id' => '1',
                'title' => 'Oegstgeest',
            ],
            [
                'id' => '242',
                'scanmodel_id' => '1',
                'title' => 'Oirschot',
            ],
            [
                'id' => '243',
                'scanmodel_id' => '1',
                'title' => 'Oisterwijk',
            ],
            [
                'id' => '244',
                'scanmodel_id' => '1',
                'title' => 'Oldambt',
            ],
            [
                'id' => '245',
                'scanmodel_id' => '1',
                'title' => 'Oldebroek',
            ],
            [
                'id' => '246',
                'scanmodel_id' => '1',
                'title' => 'Oldenzaal',
            ],
            [
                'id' => '247',
                'scanmodel_id' => '1',
                'title' => 'Olst-Wijhe',
            ],
            [
                'id' => '248',
                'scanmodel_id' => '1',
                'title' => 'Ommen',
            ],
            [
                'id' => '249',
                'scanmodel_id' => '1',
                'title' => 'Onderbanken',
            ],
            [
                'id' => '250',
                'scanmodel_id' => '1',
                'title' => 'Oost Gelre',
            ],
            [
                'id' => '251',
                'scanmodel_id' => '1',
                'title' => 'Oosterhout',
            ],
            [
                'id' => '252',
                'scanmodel_id' => '1',
                'title' => 'Ooststellingwerf',
            ],
            [
                'id' => '253',
                'scanmodel_id' => '1',
                'title' => 'Oostzaan',
            ],
            [
                'id' => '254',
                'scanmodel_id' => '1',
                'title' => 'Opmeer',
            ],
            [
                'id' => '255',
                'scanmodel_id' => '1',
                'title' => 'Opsterland',
            ],
            [
                'id' => '256',
                'scanmodel_id' => '1',
                'title' => 'Oss',
            ],
            [
                'id' => '257',
                'scanmodel_id' => '1',
                'title' => 'Oud-Beijerland',
            ],
            [
                'id' => '258',
                'scanmodel_id' => '1',
                'title' => 'Oude IJsselstreek',
            ],
            [
                'id' => '259',
                'scanmodel_id' => '1',
                'title' => 'Ouder-Amstel',
            ],
            [
                'id' => '260',
                'scanmodel_id' => '1',
                'title' => 'Oudewater',
            ],
            [
                'id' => '261',
                'scanmodel_id' => '1',
                'title' => 'Overbetuwe',
            ],
            [
                'id' => '262',
                'scanmodel_id' => '1',
                'title' => 'Papendrecht',
            ],
            [
                'id' => '263',
                'scanmodel_id' => '1',
                'title' => 'Peel en Maas',
            ],
            [
                'id' => '264',
                'scanmodel_id' => '1',
                'title' => 'Pekela',
            ],
            [
                'id' => '265',
                'scanmodel_id' => '1',
                'title' => 'Pijnacker-Nootdorp',
            ],
            [
                'id' => '266',
                'scanmodel_id' => '1',
                'title' => 'Purmerend',
            ],
            [
                'id' => '267',
                'scanmodel_id' => '1',
                'title' => 'Putten',
            ],
            [
                'id' => '268',
                'scanmodel_id' => '1',
                'title' => 'Raalte',
            ],
            [
                'id' => '269',
                'scanmodel_id' => '1',
                'title' => 'Reimerswaal',
            ],
            [
                'id' => '270',
                'scanmodel_id' => '1',
                'title' => 'Renkum',
            ],
            [
                'id' => '271',
                'scanmodel_id' => '1',
                'title' => 'Renswoude',
            ],
            [
                'id' => '272',
                'scanmodel_id' => '1',
                'title' => 'Reusel-De Mierden',
            ],
            [
                'id' => '273',
                'scanmodel_id' => '1',
                'title' => 'Rheden',
            ],
            [
                'id' => '274',
                'scanmodel_id' => '1',
                'title' => 'Rhenen',
            ],
            [
                'id' => '275',
                'scanmodel_id' => '1',
                'title' => 'Ridderkerk',
            ],
            [
                'id' => '276',
                'scanmodel_id' => '1',
                'title' => 'Rijnwaarden',
            ],
            [
                'id' => '277',
                'scanmodel_id' => '1',
                'title' => 'Rijssen-Holten',
            ],
            [
                'id' => '278',
                'scanmodel_id' => '1',
                'title' => 'Rijswijk',
            ],
            [
                'id' => '279',
                'scanmodel_id' => '1',
                'title' => 'Roerdalen',
            ],
            [
                'id' => '280',
                'scanmodel_id' => '1',
                'title' => 'Roermond',
            ],
            [
                'id' => '281',
                'scanmodel_id' => '1',
                'title' => 'Roosendaal',
            ],
            [
                'id' => '282',
                'scanmodel_id' => '1',
                'title' => 'Rotterdam',
            ],
            [
                'id' => '283',
                'scanmodel_id' => '1',
                'title' => 'Rozendaal',
            ],
            [
                'id' => '284',
                'scanmodel_id' => '1',
                'title' => 'Rucphen',
            ],
            [
                'id' => '285',
                'scanmodel_id' => '1',
                'title' => 'Saba',
            ],
            [
                'id' => '286',
                'scanmodel_id' => '1',
                'title' => 'Schagen',
            ],
            [
                'id' => '287',
                'scanmodel_id' => '1',
                'title' => 'Scherpenzeel',
            ],
            [
                'id' => '288',
                'scanmodel_id' => '1',
                'title' => 'Schiedam',
            ],
            [
                'id' => '289',
                'scanmodel_id' => '1',
                'title' => 'Schiermonnikoog',
            ],
            [
                'id' => '290',
                'scanmodel_id' => '1',
                'title' => 'Schinnen',
            ],
            [
                'id' => '291',
                'scanmodel_id' => '1',
                'title' => 'Schouwen-Duiveland',
            ],
            [
                'id' => '292',
                'scanmodel_id' => '1',
                'title' => 'Simpelveld',
            ],
            [
                'id' => '293',
                'scanmodel_id' => '1',
                'title' => 'Sint Anthonis',
            ],
            [
                'id' => '294',
                'scanmodel_id' => '1',
                'title' => 'Sint Eustatius',
            ],
            [
                'id' => '295',
                'scanmodel_id' => '1',
                'title' => 'Sint-Michielsgestel',
            ],
            [
                'id' => '296',
                'scanmodel_id' => '1',
                'title' => 'Sittard-Geleen',
            ],
            [
                'id' => '297',
                'scanmodel_id' => '1',
                'title' => 'Sliedrecht',
            ],
            [
                'id' => '298',
                'scanmodel_id' => '1',
                'title' => 'Slochteren',
            ],
            [
                'id' => '299',
                'scanmodel_id' => '1',
                'title' => 'Sluis',
            ],
            [
                'id' => '300',
                'scanmodel_id' => '1',
                'title' => 'Smallingerland',
            ],
            [
                'id' => '301',
                'scanmodel_id' => '1',
                'title' => 'Soest',
            ],
            [
                'id' => '302',
                'scanmodel_id' => '1',
                'title' => 'Someren',
            ],
            [
                'id' => '303',
                'scanmodel_id' => '1',
                'title' => 'Son en Breugel',
            ],
            [
                'id' => '304',
                'scanmodel_id' => '1',
                'title' => 'Stadskanaal',
            ],
            [
                'id' => '305',
                'scanmodel_id' => '1',
                'title' => 'Staphorst',
            ],
            [
                'id' => '306',
                'scanmodel_id' => '1',
                'title' => 'Stede Broec',
            ],
            [
                'id' => '307',
                'scanmodel_id' => '1',
                'title' => 'Steenbergen',
            ],
            [
                'id' => '308',
                'scanmodel_id' => '1',
                'title' => 'Steenwijkerland',
            ],
            [
                'id' => '309',
                'scanmodel_id' => '1',
                'title' => 'Stein',
            ],
            [
                'id' => '310',
                'scanmodel_id' => '1',
                'title' => 'Stichtse Vecht',
            ],
            [
                'id' => '311',
                'scanmodel_id' => '1',
                'title' => 'Strijen',
            ],
            [
                'id' => '312',
                'scanmodel_id' => '1',
                'title' => 'Súdwest-Fryslân',
            ],
            [
                'id' => '313',
                'scanmodel_id' => '1',
                'title' => 'Ten Boer',
            ],
            [
                'id' => '314',
                'scanmodel_id' => '1',
                'title' => 'Terneuzen',
            ],
            [
                'id' => '315',
                'scanmodel_id' => '1',
                'title' => 'Terschelling',
            ],
            [
                'id' => '316',
                'scanmodel_id' => '1',
                'title' => 'Texel',
            ],
            [
                'id' => '317',
                'scanmodel_id' => '1',
                'title' => 'Teylingen',
            ],
            [
                'id' => '318',
                'scanmodel_id' => '1',
                'title' => 'Tholen',
            ],
            [
                'id' => '319',
                'scanmodel_id' => '1',
                'title' => 'Tiel',
            ],
            [
                'id' => '320',
                'scanmodel_id' => '1',
                'title' => 'Tietjerksteradeel',
            ],
            [
                'id' => '321',
                'scanmodel_id' => '1',
                'title' => 'Tilburg',
            ],
            [
                'id' => '322',
                'scanmodel_id' => '1',
                'title' => 'Tubbergen',
            ],
            [
                'id' => '323',
                'scanmodel_id' => '1',
                'title' => 'Twenterand',
            ],
            [
                'id' => '324',
                'scanmodel_id' => '1',
                'title' => 'Tynaarlo',
            ],
            [
                'id' => '325',
                'scanmodel_id' => '1',
                'title' => 'Uden',
            ],
            [
                'id' => '326',
                'scanmodel_id' => '1',
                'title' => 'Uitgeest',
            ],
            [
                'id' => '327',
                'scanmodel_id' => '1',
                'title' => 'Uithoorn',
            ],
            [
                'id' => '328',
                'scanmodel_id' => '1',
                'title' => 'Urk',
            ],
            [
                'id' => '329',
                'scanmodel_id' => '1',
                'title' => 'Utrecht',
            ],
            [
                'id' => '330',
                'scanmodel_id' => '1',
                'title' => 'Utrechtse Heuvelrug',
            ],
            [
                'id' => '331',
                'scanmodel_id' => '1',
                'title' => 'Vaals',
            ],
            [
                'id' => '332',
                'scanmodel_id' => '1',
                'title' => 'Valkenburg aan de Geul',
            ],
            [
                'id' => '333',
                'scanmodel_id' => '1',
                'title' => 'Valkenswaard',
            ],
            [
                'id' => '334',
                'scanmodel_id' => '1',
                'title' => 'Veendam',
            ],
            [
                'id' => '335',
                'scanmodel_id' => '1',
                'title' => 'Veenendaal',
            ],
            [
                'id' => '336',
                'scanmodel_id' => '1',
                'title' => 'Veere',
            ],
            [
                'id' => '337',
                'scanmodel_id' => '1',
                'title' => 'Veldhoven',
            ],
            [
                'id' => '338',
                'scanmodel_id' => '1',
                'title' => 'Velsen',
            ],
            [
                'id' => '339',
                'scanmodel_id' => '1',
                'title' => 'Venlo',
            ],
            [
                'id' => '340',
                'scanmodel_id' => '1',
                'title' => 'Venray',
            ],
            [
                'id' => '341',
                'scanmodel_id' => '1',
                'title' => 'Vianen',
            ],
            [
                'id' => '342',
                'scanmodel_id' => '1',
                'title' => 'Vlaardingen',
            ],
            [
                'id' => '343',
                'scanmodel_id' => '1',
                'title' => 'Vlagtwedde',
            ],
            [
                'id' => '344',
                'scanmodel_id' => '1',
                'title' => 'Vlieland',
            ],
            [
                'id' => '345',
                'scanmodel_id' => '1',
                'title' => 'Vlissingen',
            ],
            [
                'id' => '346',
                'scanmodel_id' => '1',
                'title' => 'Voerendaal',
            ],
            [
                'id' => '347',
                'scanmodel_id' => '1',
                'title' => 'Voorschoten',
            ],
            [
                'id' => '348',
                'scanmodel_id' => '1',
                'title' => 'Voorst',
            ],
            [
                'id' => '349',
                'scanmodel_id' => '1',
                'title' => 'Vught',
            ],
            [
                'id' => '350',
                'scanmodel_id' => '1',
                'title' => 'Waalre',
            ],
            [
                'id' => '351',
                'scanmodel_id' => '1',
                'title' => 'Waalwijk',
            ],
            [
                'id' => '352',
                'scanmodel_id' => '1',
                'title' => 'Waddinxveen',
            ],
            [
                'id' => '353',
                'scanmodel_id' => '1',
                'title' => 'Wageningen',
            ],
            [
                'id' => '354',
                'scanmodel_id' => '1',
                'title' => 'Wassenaar',
            ],
            [
                'id' => '355',
                'scanmodel_id' => '1',
                'title' => 'Waterland',
            ],
            [
                'id' => '356',
                'scanmodel_id' => '1',
                'title' => 'Weert',
            ],
            [
                'id' => '357',
                'scanmodel_id' => '1',
                'title' => 'Weesp',
            ],
            [
                'id' => '358',
                'scanmodel_id' => '1',
                'title' => 'Werkendam',
            ],
            [
                'id' => '359',
                'scanmodel_id' => '1',
                'title' => 'West Maas en Waal',
            ],
            [
                'id' => '360',
                'scanmodel_id' => '1',
                'title' => 'Westerveld',
            ],
            [
                'id' => '361',
                'scanmodel_id' => '1',
                'title' => 'Westervoort',
            ],
            [
                'id' => '362',
                'scanmodel_id' => '1',
                'title' => 'Westland',
            ],
            [
                'id' => '363',
                'scanmodel_id' => '1',
                'title' => 'Weststellingwerf',
            ],
            [
                'id' => '364',
                'scanmodel_id' => '1',
                'title' => 'Westvoorne',
            ],
            [
                'id' => '365',
                'scanmodel_id' => '1',
                'title' => 'Wierden',
            ],
            [
                'id' => '366',
                'scanmodel_id' => '1',
                'title' => 'Wijchen',
            ],
            [
                'id' => '367',
                'scanmodel_id' => '1',
                'title' => 'Wijdemeren',
            ],
            [
                'id' => '368',
                'scanmodel_id' => '1',
                'title' => 'Wijk bij Duurstede',
            ],
            [
                'id' => '369',
                'scanmodel_id' => '1',
                'title' => 'Winsum',
            ],
            [
                'id' => '370',
                'scanmodel_id' => '1',
                'title' => 'Winterswijk',
            ],
            [
                'id' => '371',
                'scanmodel_id' => '1',
                'title' => 'Woensdrecht',
            ],
            [
                'id' => '372',
                'scanmodel_id' => '1',
                'title' => 'Woerden',
            ],
            [
                'id' => '373',
                'scanmodel_id' => '1',
                'title' => 'Wormerland',
            ],
            [
                'id' => '374',
                'scanmodel_id' => '1',
                'title' => 'Woudenberg',
            ],
            [
                'id' => '375',
                'scanmodel_id' => '1',
                'title' => 'Woudrichem',
            ],
            [
                'id' => '376',
                'scanmodel_id' => '1',
                'title' => 'Zaanstad',
            ],
            [
                'id' => '377',
                'scanmodel_id' => '1',
                'title' => 'Zaltbommel',
            ],
            [
                'id' => '378',
                'scanmodel_id' => '1',
                'title' => 'Zandvoort',
            ],
            [
                'id' => '379',
                'scanmodel_id' => '1',
                'title' => 'Zederik',
            ],
            [
                'id' => '380',
                'scanmodel_id' => '1',
                'title' => 'Zeewolde',
            ],
            [
                'id' => '381',
                'scanmodel_id' => '1',
                'title' => 'Zeist',
            ],
            [
                'id' => '382',
                'scanmodel_id' => '1',
                'title' => 'Zevenaar',
            ],
            [
                'id' => '383',
                'scanmodel_id' => '1',
                'title' => 'Zoetermeer',
            ],
            [
                'id' => '384',
                'scanmodel_id' => '1',
                'title' => 'Zoeterwoude',
            ],
            [
                'id' => '385',
                'scanmodel_id' => '1',
                'title' => 'Zuidhorn',
            ],
            [
                'id' => '386',
                'scanmodel_id' => '1',
                'title' => 'Zuidplas',
            ],
            [
                'id' => '387',
                'scanmodel_id' => '1',
                'title' => 'Zundert',
            ],
            [
                'id' => '388',
                'scanmodel_id' => '1',
                'title' => 'Zutphen',
            ],
            [
                'id' => '389',
                'scanmodel_id' => '1',
                'title' => 'Zwartewaterland',
            ],
            [
                'id' => '390',
                'scanmodel_id' => '1',
                'title' => 'Zwijndrecht',
            ],
            [
                'id' => '391',
                'scanmodel_id' => '1',
                'title' => 'Zwolle',
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}

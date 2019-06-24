<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();

    $questions = [
            [
                'title'           => 'Deskundigheid omgaan met werkgevers',
                'question'        => 'Onze scholen en gemeenten hebben voldoende deskundigheid ten aanzien van omgaan met werkgevers, waar de jongeren in een kwetsbare positie werkervaring moeten opdoen.',
                'successfactor'   => 'Professionele aanpak in de relatie met werkgevers, met kennis van context, belangen en taal van bedrijven.',
                'riskfactor'      => 'Er is weinig contact met werkgevers in de regio, waardoor gemeenten en scholen niet goed weten om te gaan met werkgevers.',
                'justification'   => '<p> De kwaliteit en de effectiviteit van de dienstverlening aan werkgevers moet beter. Hetzelfde geldt voor de bekendheid met deze dienstverlening bij werkgevers. Belangrijke randvoorwaarde voor een verbetering van de kwaliteit van de werkgeversdienstverlening is een adequate werkwijze jegens cli&euml;nten. Gelet op de signalen hierover van werkgevers is ook op dit terrein een kwaliteitsslag noodzakelijk. Zo kan een sluitende dienstverlening (voor- en nazorg) rond de plaatsing van cli&euml;nten mislukte plaatsingen en teleurstelling bij de werkgever voorkomen. </p>
                <p>Aan het opbouwen van een hechte, duurzame samenwerkingsrelatie met werkgevers is een aantal randvoorwaarden verbonden. Voorbeelden hiervan zijn: </p>
                <ul>
                  <li> Kennis van en affiniteit met de werkwereld van werkgevers en de afzonderlijke branches. </li> 
                  <li> Professionele advies- en communicatievaardigheden bij werkgeversadviseurs. </li> 
                  <li> Duidelijke voorlichting </li> 
                  <li> Een eerlijk beeld van de leerling </li> 
                  <li> Goede begeleiding en evaluatie (inclusief: wat heeft de jongere geleerd en wat moet de volgende stap in de talentonwikkeling zijn).  </li> 
                </ul>',
                'theme_id' => 1,
                'order' => 2,
            ],
            [
                'title'           => 'Re&euml;le werkervaring',
                'question'        => 'Onze scholen werken volgens het principe Learning by doing. De opleidingen staan volop in het teken van het opdoen van re&euml;le werkervaring bij werkgevers.',
                'successfactor'   => 'School werkt volgens het principe Learning by doing. Zo realistisch mogelijk, werkend  leren staat centraal.',
                'riskfactor'      => 'Er wordt te lang gewacht met echte werkervaring bij bedrijven laten opdoen, waardoor het lastiger wordt voor jongeren in een kwetsbare positie om een baan te vinden. ',
                'justification'   => '<p>In het opleidingsdeel van het traject ligt al vroeg de aandacht op arbeidstoeleiding en leren in de praktijk. Geen te schoolse, zorgende of theoretische benadering. Een tweede reden om jongeren in de opleiding al vroeg in aanraking te brengen met re&euml;le arbeidsomgevingen, is dat ze dan eerder en beter zicht krijgen op hun voorkeuren, sterktes en zwaktes. Ze ontwikkelen een re&euml;el zelfbeeld. Van belang is om in het onderwijs te investeren in betekenisvolle werkplekken &ndash; in plaats van werken met theorie en simulaties &ndash; en stages op maat te leveren, waardoor de motivatie van leerlingen voor werk zal toenemen en ze makkelijker de overstap kunnen maken naar de arbeidsmarkt.</p>',
                'theme_id' => 1,
                'order' => 1,
            ],
            [
                'title'           => 'Samenwerking met werkgevers',
                'question'        => 'Onze scholen en gemeenten ontzorgen (zelf of in samenwerking met partners) werkgevers goed bij stages, werkervaringsplaatsen en arbeidstoeleiding.',
                'successfactor'   => 'Op het vlak van arbeidstoeleiding vindt proactieve samenwerking plaats met werkgevers en andere relevante organisaties, zoals (andere) scholen en werkgeversservicepunten.',
                'riskfactor'      => 'Door gebrek aan samenwerking blijven kansen bij werkgevers onbenut.',
                'justification'   => '<p>Het vinden van stageplaatsen en werk is voor jongeren in een kwetsbare positie een belangrijke drempel. Het aantal bedrijven dat zich actief meldt om de deuren voor deze jongeren open te zetten is beperkt. Er kunnen meer arbeidsplaatsen worden gecre&euml;erd als nauwe samenwerking plaatvindt tussen bijvoorbeeld scholen, werkgeversservicepunten, S-BB met haar grote netwerk van leerbedrijven (Boris Baan) en private intermediairs.</p>',
                'theme_id' => 1,
                'order' => 3,
            ],
            [
                'title'           => 'Ondersteuning bij stages',
                'question'        => 'Onze scholen en gemeenten ontzorgen (zelf of in samenwerking met partners) werkgevers goed bij stages, werkervaringsplaatsen en arbeidstoeleiding.',
                'successfactor'   => 'School heeft kennis en mogelijkheden om werkgevers direct en/of via samenwerking te ontzorgen bij stages en arbeidstoeleiding.',
                'riskfactor'      => 'Werkgevers in de regio bieden beperkt arbeidsplaatsen aan of haken af, omdat ze niet goed worden ondersteund door scholen en gemeente.',
                'justification'   => '<p>Het is belangrijk dat scholen toegang hebben tot mogelijkheden als jobcoaching en begeleid werken om werkgevers te ontzorgen bij het verzorgen van stages en arbeidstoeleiding. Uit het onderzoek &lsquo;Evaluatie jobcoaching&rsquo; blijkt dat jobcoaching en begeleid werken inderdaad effectieve instrumenten zijn om cli&euml;nten met structurele functionele beperkingen bij reguliere werkgevers aan het werk te helpen en te onderhouden. Wel zijn er zwakke punten op te merken. Namelijk dat het bereik slechts beperkt is, er sprake is van een hoge uitval en relatief hoge kosten.  Daarnaast is het belangrijk om als school goed op de hoogte te zijn van bestaande instrumenten die kunnen worden ingezet om de arbeidstoeleiding van jongeren in een kwetsbare positie te verbeteren. Hierbij is het ook van belang goed te beoordelen of het instrument past bij de doelgroep.</p>',
                'theme_id' => 1,
                'order' => 4,
            ],
            [
                'title'           => 'Goed en breed netwerk',
                'question'        => 'Onze scholen en gemeenten hebben een voldoende groot en divers netwerk van geschikte bedrijven voor stages en plaatsingskansen voor jongeren in een kwetsbare positie.',
                'successfactor'   => 'School en gemeente hebben voldoende netwerk van geschikte bedrijven voor stages en plaatsingskansen.',
                'riskfactor'      => 'Scholen en gemeenten hebben niet genoeg contacten met werkgevers, waardoor de plaatsingskansen voor leerlingen beperkt zijn. ',
                'justification'   => '<p>Ook het betrekken van de werkgevers als partner door zowel scholen als gemeenten is van belang om de plaatsingskansen te vergroten. Een goede voorlichting helpt bij het wegnemen van vooroordelen bij werkgevers over het aannemen van jongeren met een arbeidsbeperking als ook het breder bekend maken van voorzieningen die het aannemen van een kwetsbare jongere aantrekkelijk maken. Dit is belangrijk omdat uit onderzoek bekend is dat een snelle plaatsing bij een werkgever belangrijk is voor succesvolle toeleiding naar de arbeidsmarkt. Samenwerking heeft ook betrekking op aspecten als het inzicht in het bedrijf, inzicht in de arbeidsvraag, zorgen voor &eacute;&eacute;n aanspreekpunt en het bieden van ondersteuning aan de werkgever. Het netwerk moet divers en breed genoeg zijn om jongeren op maat werkervaring en competenties te kunnen laten opdoen. </p>',
                'theme_id' => 1,
                'order' => 5,
            ],
            [
                'title'           => 'Individueel gestimuleerd',
                'question'        => 'Jongeren worden door onze scholen en gemeenten gestimuleerd en empowered (eigen kracht, zelfvertrouwen), dus niet gepamperd of ‘schools’ benaderd.',
                'successfactor'   => 'Jongeren ontvangen een individuele, op empowerment gericht en dus stimulerende benadering.',
                'riskfactor'      => 'De focus wordt gelegd op de criteria die moeten worden behaald, in plaats van uit te gaan van wat de talenten en mogelijkheden van de individuele jongere. ',
                'justification'   => '<p>Belangrijk is dat ontwikkeldoelen en het programma op het individu zijn toegesneden. Uitgangspunt is wat de jongere kan, in plaats van toewerken naar criteria waaraan moet worden voldaan. Instructie en begeleiding zijn afgestemd op het individu. De mate van begeleiding en verdieping wordt afgestemd op wat de jongere aankan. Daarbij aansluitend is het belangrijk om niet automatisch mee te bewegen met de voorkeuren of wensen van de jongere; een begeleider moet durven confronteren, durven de diepte in te gaan om leerlingen dingen te laten doen die ze niet eerder hebben doen (empowerment).  </p>',
                'theme_id' => 2,
                'order' => 1,
            ],
            [
                'title'           => 'Deskundige begeleiding',
                'question'        => 'Docenten en begeleiders zijn in staat om jongeren goed te begeleiden, vertrouwen te geven en zo te laten groeien. Ze beschikken namelijk daartoe over een niet te hoge caseload, goede competenties en stimulerende persoonlijkheid.',
                'successfactor'   => 'Docenten en begeleiders zijn qua caseload, competenties en persoonlijkheid in staat om jongeren goed te begeleiden, vertrouwen te geven en zo te laten groeien.',
                'riskfactor'      => 'Jongeren hebben te maken met veel wisselingen van begeleiders, waardoor begeleiders niet goed op de hoogte zijn van de voortgang van het traject. Of de begeleiders hebben niet de goede competenties en randvoorwaarden (caseload) om jongeren echt te kunnen helpen en stimuleren. ',
                'justification'   => 'Jongeren worden door een deskundig begeleider ondersteund. Belangrijk is dat een vaste begeleider regelmatig de jongere bezoekt en contact met het bedrijf onderhoudt. ‘Deskundig’ betekent dat een begeleider een empowerende persoonlijkheid heeft, kennis heeft van de bedrijfsprocessen en kennis heeft over de jongere en zijn specifieke problematiek. Bij voorkeur draagt een en dezelfde persoon zowel de zorg voor het leertraject en de nazorg. Goede randvoorwaarden gaat onder andere over een uitvoerbare caseload, waardoor een jongere echt iemand naast zich voelt staan, die helpt en stimuleert.',
                'theme_id' => 2,
                'order' => 2,
            ],
            [
                'title'           => 'Vroegtijdige signalering',
                'question'        => 'Docenten en begeleiders hebben vroegtijdig zicht op belemmeringen, mogelijkheden en loopbaanwensen van de jongeren.',
                'successfactor'   => 'Vroegtijdige signalering en diagnostiek zijn nodig. Docenten en klantmanagers hebben met het oog op gerichte begeleiding en tijdige inzet van interventies vroegtijdig zicht op belemmeringen, mogelijkheden en loopbaanwensen. ',
                'riskfactor'      => 'Docenten of klantmanagers onderschatten de problematiek van de jongere, niet of onvoldoende wordt gezien dat er op een of meer leefgebieden beperkingen of lastige factoren zijn die onderkend en aangepakt moeten worden. Hierdoor worden kansen gemist.',
                'justification'   => '<p>Stimuleren, empowerment, focus op werk en talent, het is cruciaal en leading in het beste in jongeren zien en benutten. Tegelijkertijd is ook essentieel dat het bekend en onderkend wordt als er beperkingen zijn op bijvoorbeeld het vlak van zorg of schulden, waar zo snel mogelijk ook aandacht voor moet zijn en die opgelost of beheerst moeten worden.</p>',
                'theme_id' => 2,
                'order' => 3,
            ],
            [
                'title'           => 'Ouders/verzorgers actief betrokken',
                'question'        => 'Ouders/verzorgers zijn actief, echt betrokken bij het stimuleren en op weg helpen van de jongeren op weg naar zo groot mogelijke kansen op de arbeidsmarkt.',
                'successfactor'   => 'Impact van ouders wordt actief en gericht benut door hen actief te betrekken, stimuleren en committeren bij de voortgang op school en op de stageplek/werkervaringsplek.',
                'riskfactor'      => 'Ouders/verzorgers zijn niet goed betrokken bij de jongere, waardoor verwachtingen niet helder zijn en kansen worden gemist als het gaat om het zetten van stappen in de goede richting op weg naar talenten onderkennen en benutten.',
                'justification'   => '<p>Uit onderzoek blijkt dat de impact van ouders vaak wordt onderschat en dat hun rol als bondgenoot in het op weg helpen van de jongere vaak niet of onvoldoende wordt benut. Het is verstandig ouders/verzorgers vroegtijdig te betrekken bij de toeleiding naar arbeid. Het geven van een stem aan ouders in de doelformuleringen en in het traject voorkomt dat de thuisomgeving van de jongere zich als tegenkracht ontwikkelt. Idealiter hebben de leerling, de onderwijs- en arbeidspartners &eacute;n de ouder(s) dezelfde doelen voor ogen.</p>

<p>Scholen kunnen ouders betrekken bij de het proces omtrent arbeidstoeleiding door allereerst ouders bewust te maken van het belang van hun rol bij schoolloopbaankeuzes. Dit kan aan de orde komen bij het intakegesprek, waarbij het raadzaam is ook ouders uit te nodigen. Wederzijdse verwachtingen zijn dan van begin af aan duidelijk. Dat cre&euml;ert een goede basis en dat is nodig: beroeps- en schoolloopbaankeuzes blijken nog amper onderwerp van gesprek te zijn tussen school en ouders. Ten tweede is het belangrijk om alle ouders uit te nodigen voor reguliere voortgangsgesprekken met leerlingen over hun toekomst. Nu nodigen scholen ouders vaak pas uit als er problemen zijn, waardoor het contact een negatieve connotatie krijgt.</p>

<p>Verder gaat het erom ouders op het juiste spoor van begeleiding te zetten. Ouders die het gevoel hebben hun ondersteunende rol goed te vervullen, doen dit beter dan ouders die twijfelen aan wat er van hen wordt verwacht. De school kan handvatten geven voor de begeleiding thuis, naast begrijpelijke informatie en concrete afspraken over wat ieder gaat doen om zich te ori&euml;nteren op loopbaankeuzes.</p>

<p>Maar ook kunnen ouders van elk&aacute;&aacute;r leren. Het is aan de school om mogelijkheden te bieden om ervaringen uit te wisselen en vraagstukken te bespreken. Dat kan bijvoorbeeld door ouderavonden en opvoedcursussen te organiseren. Zulke bijeenkomsten versterken de netwerken van ouders, en dat is ook in het belang van de student.  </p>',
                'theme_id' => 2,
                'order' => 4,
            ],
            [
                'title'           => 'Vroegtijdige begeleiding en overdracht',
                'question'        => 'De begeleiding van jongeren door de gemeente wordt al opgestart voordat ze de school verlaten en de uitgebreide kennis van de school over de jongere wordt ook na schoolverlaten nog steeds benut.',
                'successfactor'   => 'Er is sprake van een vroegtijdige warme overdracht van scholen naar gemeenten zodra het moment dat de jongere school verlaat dichterbij komt en daarna. ‘Het estafettestokje mag niet vallen.’ ',
                'riskfactor'      => 'Gemeenten zijn onvoldoende preventief bezig, hebben geen zicht op het aantal jongeren dat school gaat verlaten, kennis bij de school wordt onvoldoende benut bij de arbeidstoeleiding, waardoor jongeren onnodig werkloos worden of uit beeld kunnen verdwijnen.',
                'justification'   => '<p>Om ervoor te zorgen dat gemeenten zicht hebben op het aantal jongeren dat binnenkort school gaat verlaten, moet er sprake zijn van een goed functionerend netwerk en moeten er afspraken zijn gemaakt over overgang school naar werk. Dit betreft concrete afspraken over het &ndash;collectief- doorspreken van leerlingen die de school gaan verlaten en individuele leerlingbesprekingen. Ook moet er sprake zijn van een gestroomlijnde informatieoverdracht tussen scholen, UWV en gemeenten. Voor scholen is het goed laten verlopen van de overdracht een uitdaging door de complexe netwerken die zij moeten onderhouden met verschillende gemeenten die ook vaak nog eens eigen beleid en procedures hebben.</p>',
                'theme_id' => 2,
                'order' => 5,
            ],
            [
                'title'           => 'Jongere maakt zelf toekomstplan',
                'question'        => 'De jongere maakt in onze regio – zo nodig met ondersteuning – zelf een toekomstplan, waarin aandacht is voor alle leefgebieden.',
                'successfactor'   => 'De jongere brengt, met hulp van anderen, zijn/haar vragen en problemen op alle leefdomeinen in beeld, en maakt daar een toekomstplan van.',
                'riskfactor'      => ' Er zijn veel mensen betrokken bij de jongere, maar ze werken langs elkaar heen én er is geen duidelijk plan.',
                'justification'   => '<p>Jongeren in een kwetsbare positie hebben vaak problemen op meerdere leefgebieden. Deze leefgebieden zijn interdependent.  In het rapport &lsquo;Ook voor kwetsbare jongeren een passende toekomst&rsquo; is geconstateerd dat gemeenten en netwerkpartners ervan doordrongen zijn dat zij (toekomst)plannen moeten maken voor en met kwetsbare jongeren en dat zij in deze plannen de verbinding moeten maken tussen het jeugddomein en het volwassenendomein. Daarbij is het uitgangspunt om het plan zo veel mogelijk integraal te laten zijn en op verschillende leefgebieden betrekking te laten hebben. Het betreft dan de leefgebieden wonen/huisvesting, onderwijs, dagbesteding, werk en inkomen (financi&euml;n), geestelijke en lichamelijke gezondheid en criminaliteit (preventie van terugval).</p>

<p>Een integraal toekomstplan dat alle leefgebieden behelst is een goed instrument om de jongere actief te betrekken bij het ontwikkelen van een visie op zijn eigen toekomst, het stellen van doelen en het bepalen van de stappen die daarbij gezet moeten worden. Hierbij is het belangrijk om de jongere centraal te stellen in het formuleren van de aanpak.  </p>',
                'theme_id' => 3,
                'order' => 1,
            ],
            [
                'title'           => 'Soepele overgang boven 18',
                'question'        => 'We zorgen voor een soepele overgang van de ondersteuning bij jongeren die 18 jaar worden (van Jeugdwet naar WMO, Zvw of Wlz).',
                'successfactor'   => 'De jongere merkt zo min mogelijk van de overgang naar een ander wettelijk kader en kan hulp blijven ontvangen na de 18e verjaardag.',
                'riskfactor'      => 'Zodra de jongere 18 wordt stopt de hulp en staat hij/zij er alleen voor.',
                'justification'   => '<p>Indien de jeugdhulp en de zorg na de 18e verjaardag niet bij dezelfde aanbieder ingekocht zijn moet de jongere overstappen naar een andere hulpverlener. Een andere organisatie, locatie of nieuwe gezichten kan voor de jongere reden zijn om af te haken. Daarbij komt dat jongeren de overgang naar volwassenheid ook ervaren als een nieuw verworven vrijheid en zelfstandigheid. De jongeren willen het graag zelf proberen en mogen dat nu ook. Dit motivatieprobleem speelt met name bij jongeren met een licht verstandelijke beperking (LVB). Deze jongeren hebben vaak een beperkt zelfinzicht en zijn daardoor onvoldoende overtuigd van de noodzaak van een gecontinueerde zorg of begeleiding. Gevolg is dat de jongeren niet de zorg krijgen die zij nodig hebben. Het is dus belangrijk dat betrokken partijen ervoor zorgen dat die overgang van zorgverleners soepel verloopt.  </p>',
                'theme_id' => 3,
                'order' => 2,
            ],
            [
                'title'           => 'Snel een passende woonplek',
                'question'        => 'Jongeren kunnen in onze regio binnen afzienbare tijd een betaalbare en passende woonplek vinden.',
                'successfactor'   => 'Jongeren kunnen binnen afzienbare tijd (6 maanden) een woonplek vinden als zij die nodig hebben.',
                'riskfactor'      => 'Jongeren moeten jaren wachten op een zelfstandige woonplek, blijven ongewenst thuiswonen, of verblijven langer in de jeugdzorg omdat er geen andere optie is.',
                'justification'   => '<p>Jongeren die in een jeugdhulpinstelling verblijven op het moment dat zij 18 jaar worden moeten op zoek naar andere huisvesting. Hierom moet in het toekomstplan ook rekening worden gehouden met het feit dat een jongere binnen afzienbare tijd een betaalbare passende woning nodig heeft. Het is bijvoorbeeld erg nadelig als in het toekomstplan van een jongere is opgenomen dat hij beschermd wil wonen (en dat ook nodig heeft), daar al op voorbereid is, maar hij eerst op een wachtlijst terecht komt. Soms komt de jongere dan weer terecht in een ongewenste situatie. Hij moet dan bijvoorbeeld weer thuis gaan wonen, terwijl daar de problemen juist zijn ontstaan. Om te kunnen anticiperen op de (toekomstige) vraag naar voorzieningen, zullen gemeenten het aanbod strategisch en flexibel moeten organiseren. Daarvoor is het belangrijk dat gemeenten weten hoeveel jongeren zich na gesloten verblijf weer vestigen in hun woonplaats of over (willen) komen van andere gemeenten. Tevens is van belang dat bekend is wat de situatie van deze jongeren is en wat hun algehele toekomstplan is (overzicht). Om tijdig voorbereidingen te kunnen treffen, dienen gemeenten en netwerkpartners (waaronder woningbouwcorporaties) onderling (en regionaal) dusdanig beleidsafspraken te maken over de hoeveelheid en het niveau van de voorzieningen, dat de toegankelijkheid ervan voor kwetsbare jongeren een haalbaar perspectief betekent. </p>',
                'theme_id' => 3,
                'order' => 3,
            ],
            [
                'title'           => 'Vertrouwde volwassene',
                'question'        => 'Elke jongere kan in onze regio bij vragen en problemen terecht bij een vertrouwde volwassene (ouder, mentor, maatje).',
                'successfactor'   => 'Elke jongere kan bij een vertrouwde volwassene terecht met vragen en problemen.',
                'riskfactor'      => 'Jongeren in een kwetsbare positie staan er veelal alleen voor, en hulpverleners wisselen elkaar snel af.',
                'justification'   => '<p>Het is niet te voorkomen dat jongeren in een kwetsbare positie te maken krijgen met wisselende hulpverleners. Om ervoor te zorgen dat jongeren hiermee om kunnen gaan, is het belangrijk dat zij terecht kunnen bij een social parent of mentor. Dit is een vertrouwde persoon uit de informele omgeving, die gedurende een langere periode naast de jongere staat. Onderzoek wijst erop dat een betrokken mentor kan helpen bij het voorkomen van uithuisplaatsing. Voor jongeren in een kwetsbare positie is het niet vanzelfsprekend dat zij een social parent of mentor hebben. Het vraagt dus extra aandacht om dit te organiseren.  </p>',
                'theme_id' => 3,
                'order' => 4,
            ],
            [
                'title'           => 'Hulpverleners herkennen financi&euml;le problematiek',
                'question'        => 'Docenten, begeleiders en hulpverleners zijn in staat om financi&euml;le problematiek (zoals schulden) en/of LVB te herkennen.',
                'successfactor'   => 'Hulpverleners zijn in staat om financi&euml;le problematiek en/of LVB bij jongeren te herkennen en oplossingen aan te dragen.',
                'riskfactor'      => 'Hulpverleners herkennen financi&euml;le problematiek en/of LVB bij jongeren niet. Er wordt geen gepaste hulp geboden, waardoor schulden oplopen en jongeren niet in staat zijn om te participeren in de samenleving.',
                'justification'   => '<p>Steeds meer jongeren hebben steeds grotere problematische schulden. Schulden kunnen een belemmering vormen om aan het werk te gaan of te blijven. Mensen die rond moeten komen van een klein budget zijn constant bezig met vragen zoals &ldquo;Hoe moet ik de rekeningen betalen?&rdquo; en &ldquo;Waar haal ik geld vandaan om de rest van de week te kunnen eten?&rdquo;. Dit neemt een deel van de cognitieve capaciteit in beslag, waardoor ze dus minder capaciteit over hebben voor andere dingen. Mullainathan en Shafir (2013) noemen dit bandbreedte. Het gebrek aan geld laat mensen die rond moeten komen van een klein budget nooit met rust. Zelfs als ze niet direct bezig zijn met rondkomen, zoals op hun werk, dan nog zullen deze gedachten zich constant opdringen. Vergelijk het met een voorbij denderende trein: als je aan het werk bent en er raast constant een trein voorbij, dan zul je je even minder goed kunnen concentreren. Zo werkt het ook met mensen die moeten rondkomen van een laag besteedbaar inkomen: schaarste eist de aandacht onvrijwillig en onbewust op, waardoor mensen die een gebrek aan geld ervaren zich minder goed kunnen concentreren op andere dingen (zoals school of werk). Ook het volgen van een behandeling of het nakomen van afspraken is vele malen moeilijker wanneer iemand grote stress ervaart door bijvoorbeeld schulden. Daarnaast ligt een deel van de oplossing vaak in het erkennen van schulden of andere problematiek en het oplossen hiervan alvorens aan de slag te gaan met andere zaken (school, werk).</p>

<p>LVB<br />
Jongeren met LVB verdienen bijzondere aandacht, omdat zij onvoldoende risico&rsquo;s en consequenties overzien van het eigen handelen, potentieel slachtoffer kunnen worden van financieel misbruik door de kwetsbaarheid die een LVB vaak met zich meebrengt en moeite hebben met de te hoge bureaucratische eisen die gesteld worden aan mensen om gebruik te maken van voorzieningen die kunnen voorkomen dat zij in financi&euml;le problemen terechtkomen, zoals toeslagen of het minimabeleid. </p>

<p>Om ervoor te zorgen dat financi&euml;le problematiek geen belemmering vormt voor het realiseren van arbeidstoeleiding, is het belangrijk om:</p>

<p>1. financi&euml;le problemen te voorkomen;<br />
Nadrukkelijke aandacht voor de mogelijkheid van een LVB en/of schuldenproblematiek en hier z.s.m. op ingrijpen.<br />
2. financi&euml;le problemen te stabiliseren of op te lossen en;<br />
Net als de professionals die betrokken zijn bij de aanpak van schuldenproblematiek hebben professionals die betrokken zijn bij arbeidstoeleiding vaak geen ruimte om mensen met een LVB extra uitleg of begeleiding te geven. Het is dus belangrijk dat professionals de ruimte en mogelijkheden krijgen om snel en effectief samen te werken met experts.<br />
3. duurzame inzetbaarheid op de arbeidsmarkt te stimuleren.<br />
In de uitvoeringspraktijk is sprake van twee scholen. De ene school is van mening dat mensen met problematische schulden ruimte moeten krijgen om deze te stabiliseren alvorens maximaal wordt ingezet op arbeidstoeleiding. De andere school is van mening dat maximale inzet op werk de eerste stap is in het oplossen van de schuldenproblematiek. Het is van belang dat er meer duidelijkheid komt over wat de meest effectieve aanpak is. Tot die tijd is het van belang dat de professionals die een persoon met LVB begeleiden op het gebeid van financi&euml;le problemen en bij re-integratie hun strategie en acties onderling afstemmen<br />
</p>',
                'theme_id' => 3,
                'order' => 5,
            ],
            [
                'title'           => 'Gedeelde visie tussen betrokken partners',
                'question'        => 'Er is een gedeelde visie tussen betrokken partners op de verschillende leefgebieden (zoals school, werk, zorg, inkomen en wonen) over hun verantwoordelijkheden en inzet bij de arbeidstoeleiding van school naar werk van de jongeren.',
                'successfactor'   => 'Er is een gedeelde visie onder partners op de arbeidstoeleiding van jongeren, op de verantwoordelijkheden en de inzet van betrokken partijen. ',
                'riskfactor'      => 'Partners worden pas te laat ingelicht, waardoor de kans groot is dat jongeren uit beeld verdwijnen.',
                'justification'   => '<p>Partners worden in een vroeg stadium in een toeleidingtraject betrokken. Samenwerkingspartners maken vooraf afspraken over wie wat wanneer levert. Dat geldt zowel voor partners die gericht zijn op de toeleiding naar werk &ndash; het proces van arbeidstoeleiding en nazorg -, als voor partners die al eerder of langer contact met de jongere hebben. Denk aan jeugdzorg. Als partners pas worden ingeschakeld op het moment dat hun inzet wordt vereist, is het te laat. Omdat het moment van inschakelen van andere partners niet altijd vooraf kan worden voorzien, loop je de kans de jongere kwijt te raken omdat op hun inzet gewacht moet worden. Het is belangrijk om in een traject snel te kunnen schakelen. Tegelijkertijd is het belangrijk om het aantal schakelmomenten te minimaliseren. Hoe meer schakels, hoe kwetsbaarder het traject van de jongere wordt.</p>',
                'theme_id' => 4,
                'order' => 1,
            ],
            [
                'title'           => 'Samenwerking op en tussen niveaus',
                'question'        => 'Er vindt tussen netwerkpartners structureel op verschillende niveaus (beleid, uitvoering) overleg plaats over de gezamenlijke aanpak.',
                'successfactor'   => 'Er vindt structureel op en tussen verschillende niveaus overleg plaats tussen netwerkpartners over de samenwerking.',
                'riskfactor'      => 'Er vindt niet voldoende overleg plaats op en tussen verschillende niveaus, waardoor het de arbeidstoeleiding van jongeren wordt bemoeilijkt.',
                'justification'   => '<p>Het kan voorkomen dat op <em>docentniveau</em> goed contact is, terwijl op directieniveau geen steun verkregen wordt voor de ambities van de samenwerking. Er moeten voldoende verbanden zijn op operationeel niveau &ndash; de werkvloer -, maar als die niet gedekt worden op tactisch en strategisch niveau &ndash; directie en bestuurders -, kan de samenwerking niet functioneren.</p>',
                'theme_id' => 4,
                'order' => 2,
            ],
            [
                'title'           => 'Duidelijke regie',
                'question'        => 'Er bestaat duidelijkheid over wie wanneer de regie heeft over de begeleiding van de jongere (casemanagement).',
                'successfactor'   => 'Helder is per fase in de begeleiding welke docent of (traject)begeleider de regie heeft over de begeleiding van de jongere. Deze heeft overzicht en co&ouml;rdineert interventies naar de jongere toe.',
                'riskfactor'      => 'Voor de jongeren is het niet duidelijk bij wie hij/zij terecht moet voor vragen/ondersteuning.',
                'justification'   => '<p>Regie op het niveau van de trajecten ligt bij de partij die de jongere op dat moment onder zijn hoede heeft. Wanneer de jongere op school zit, is dat de school, wanneer de jongere eenmaal aan het werk is, is dat het bedrijf. Maar natuurlijk wel met een eenduidige overdracht van informatie.</p>',
                'theme_id' => 4,
                'order' => 3,
            ],
            [
                'title'           => 'Eenduidige afspraken',
                'question'        => 'De betrokken scholen (VSO, PrO en mbo) in de regio werken zodanig samen dat er eenduidige afspraken met gemeenten gemaakt kunnen worden.',
                'successfactor'   => 'De scholen werken zodanig samen dat er een goede samenwerking met gemeenten mogelijk is.',
                'riskfactor'      => 'Er is geen sprake van zodanige afstemming en samenwerking tussen de betreffende scholen, dat het voor gemeenten helder is hoe zij het beste de scholen op een eenduidige en efficiente wijze kunnen ondersteunen bij het betreden van de arbeidsmarkt door de leerlingen.',
                'justification'   => '<p>Scholen en gemeenten hebben hun eigen perspectieven en mogelijkheden. In de aansluiting onderwijs-arbeidsmarkt is het maken van heldere, eenduidige afspraken over rollen, preventieve acties, nazorg et cetera bij de arbeidstoeleiding van leerlingen erg belangrijk. Samenwerking in plaats van twee werelden die elkaar niet kennen en benutten. Daarvoor hebben de scholen onderling ook te zorgen voor goede afstemming, omdat het anders voor de gemeenten lastig wordt om met een diffuus onderwijsveld goed te werken.</p>',
                'theme_id' => 4,
                'order' => 4,
            ],
            [
                'title'           => 'Samenwerking gemeenten',
                'question'        => 'Gemeenten in de regio werken zodanig met elkaar samen dat er eenduidige afspraken met de scholen en andere netwerkpartners gemaakt kunnen worden.',
                'successfactor'   => 'De gemeenten werken zodanig samen dat er een eenduidige en goede samenwerking met scholen mogelijk is.',
                'riskfactor'      => 'De scholen worden geconfronteerd met een groot aantal verschillen tussen gemeenten in de werkwijze, subsidies, begeleiding, moment van overpakken en andere facetten van succesvolle arbeidstoeleiding. Dat maakt de samenwerking met gemeenten erg lastig en ineffici&euml;nt.',
                'justification'   => '<p>De regierol bij het vinden en behouden van werk ligt bij de gemeente. Met UWV vormen gemeenten in Nederland arbeidsmarktregio&rsquo;s. Het werken in regio&rsquo;s maakt het lokaal en regionaal vormgeven van beleid en het maken van afspraken rond arbeidstoeleiding, arbeidsparticipatie en tegengaan van (jeugd)werkloosheid mogelijk. Om dit goed te laten functioneren is het belangrijk dat gemeenten in arbeidsmarktregio&rsquo;s met elkaar samenwerken. Dit is bij jongeren met een kwetsbare positie extra belangrijk. Scholen in het VSO, PrO en Entree onderwijs moeten geen last hebben van grote verschillen tussen gemeenten in bijvoorbeeld het moment en de wijze waarop jongeren worden overgepakt, scholen worden ondersteund en arbeidsplaatsen worden gezocht.</p>',
                'theme_id' => 4,
                'order' => 5,
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}

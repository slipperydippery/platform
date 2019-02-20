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
                'title'                     => 'Werkend leren',
                'body'              => 'Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.',
                'weergave_succesfactor'     => '<ul>
    <li>Learning by doing</li>
    <li>De praktijk centraal</li>
    <li>Zo reëel en realistisch mogelijk</li>
    <li>(Gecertificeerde) vaardigheden en werkervaring opdoen</li>
</ul>
',
                'weergave_succesfactor'                      => 'School werkt volgens het principe: Learning by doing. Het werkend leren, zo reëel en realistisch mogelijk, staat centraal. ',
                'theme_id' => 1,
            ],
            [
                'title'                     => 'Professionele relatie met werkgevers',
                'body'              => 'Samenwerking met werkgevers niet als secundaire activiteit (‘erbij’), maar professioneel, door te investeren in kennis en relatie. Goed aansluiten op de context, belangen en taal van bedrijven) en zakelijk (open en eerlijk vooraf, goede begeleiding tijdens, goede evaluatie).',
                'weergave_succesfactor'     => '<ul>
  <li>School investeert in relaties</li>
  <li>Schoolt heeft kennis van de zakelijke context en belangen van werkgevers</li>
  <li>School spreekt de taal van bedrijven </li>
  <li>School stelt zich zakelijk op in de relatie
  <ul>
    <li>School geeft een open en eerlijk beeld van leerlingen</li>
    <li>Er worden duidelijke afspraken gemaakt</li>
    <li>Jongeren worden goed begeleid</li>
    <li>Er vindt monitoring en evaluatie plaats</li>
  </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'Onze scholen hanteren in het algemeen een professionele aanpak in de relatie met werkgevers. En spreken dus de taal en kennen de context en belangen van bedrijven.',
                'theme_id' => 1,
            ],
            [
                'title'                     => 'Proactieve samenwerking bij arbeidstoeleiding',
                'body'              => 'Proactief samenwerken met andere organisaties/intermediairs (werkgeversservicepunt, SBB, scholen onderling etc) voor het maximaal zien en pakken van kansen.',
                'weergave_succesfactor'     => '<ul>
  <li>School werkt naar werkgevers toe proactief samen met organisaties/intermediairs, zoals
    <ul>
    <li>Werkgeversservicepunt</li>
      <li>SBB</li>
      <li>Andere scholen</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'Onze scholen werken proactief samen met intermediairs op het vlak van arbeidstoeleiding.
',
                'theme_id' => 1,
            ],
            [
                'title'                     => 'Professioneel ontzorgen van werkgevers',
                'body'              => 'Kennis van en vaardigheden voor professioneel ontzorgen en op maat inzet van instrumenten bij werkgevers: administratief, begeleiding, compensatie lagere productiviteit, proefperiode etc. Waar nodig inclusief een rol van arbeidstoeleidingsbedrijven.',
                'weergave_succesfactor'     => '<ul>
  <li>School ontzorgt werkgevers op het vlak van:
    <ul>
      <li>Administratie</li>
      <li>Begeleiding</li>
      <li>Financiële regelingen </li>
      <li>Wet- en regelgeving</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'Onze scholen en gemeenten ontzorgen (zelf of in samenwerking met partners) werkgevers goed bij stages, werkervaringsplaatsen en arbeidstoeleiding.',
                'theme_id' => 1,
            ],
            [
                'title'                     => 'Voldoende geschikte bedrijven',
                'body'              => 'Beschikbaarheid van voldoende werkgevers om jongeren met LVB passende werkervaring te laten opdoen en kansen te geven.',
                'weergave_succesfactor'     => '<ul>
    <li>School heeft een voldoende groot netwerk voor  stages</li>
    <li>School heeft een voldoende groot netwerk voor plaatsingen na afronding school</li>
    <li>Het netwerk van bedrijven is divers en omvat een groot aantal branches en sectoren</li>
</ul>',
                'weergave_succesfactor'                      => 'Onze scholen en gemeenten hebben een voldoende groot en divers netwerk van geschikte bedrijven voor stages en plaatsingskansen voor jongeren in een kwetsbare positie.',
                'theme_id' => 1,
            ],
            [
                'title'                     => 'Jongeren worden gestimuleerd en empowered',
                'body'              => 'Benadering (bejegening) van jongeren niet ‘schools’ of ‘beschermend’, maar stimuleren en empoweren. Jongeren zoveel mogelijk zelf laten ontdekken en ervaren wat werk inhoudt en wat daarbij komt kijken, met coaching die gericht is op het leren van eigen ervaringen.',
                'weergave_succesfactor'     => '<ul>
    <li>Geen overbeschermde benadering</li>
    <li>Geen ‘schoolse’ benadering</li>
    <li>Jongeren ontdekken en ervaren zelf</li>
    <li>Coaching richt zich op leren door eigen ervaringen (learning by doing)</li>
</ul>',
                'weergave_succesfactor'                      => 'Jongeren worden door onze scholen en gemeenten gestimuleerd en empowered, niet gepamperd of ‘schools’ benaderd.',
                'theme_id' => 2,
            ],
            [
                'title'                     => 'Begeleiding van de jongere',
                'body'              => 'De impact van begeleiding staat of valt met daadwerkelijke aandacht. Er echt zijn voor de jongere, die dat ook zo voelt. Vertrouwen. In selectie, caseload, toerusting en organisatie zijn de waarborgen voor deze echte ‘presentie’ gewaarborgd.',
                'weergave_succesfactor'     => '<ul>
  <li>Een ruime mate van stabiele persoonlijke aandacht </li>
  <li>Opbouwen van een vertrouwensband </li>
  <li>Effectieve begeleiding, ‘presentie’ door:
    <ul>
      <li>Handelbare caseload </li>
      <li>Begeleider heeft op de jongere afgestemde competenties</li>
      <li>Toerusting en ondersteuning vanuit de organisatie</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'Docenten en begeleiders zijn in staat om jongeren goed te begeleiden, vertrouwen te geven en zo te laten groeien. Ze beschikken namelijk daartoe over een niet te hoge caseload, goede competenties en empowerende persoonlijkheid.',
                'theme_id' => 2,
            ],
            [
                'title'                     => 'Signalering en diagnose',
                'body'              => 'Vroegtijdige signalering en diagnose: – eventueel m.b.v. diagnostisch onderzoek - ervoor zorgen dat wensen en mogelijkheden goed in beeld zijn en dat zo vroeg mogelijk onderkend wordt welke factoren de school- en werkloopbaan kunnen belemmeren, zodat de begeleiding daarop kan worden afgestemd.',
                'weergave_succesfactor'     => '<ul>
    <li>School heeft vroegtijdig inzicht in wensen en voorkeuren</li>
    <li>School heeft vroegtijdig inzicht in competenties en mogelijkheden</li>
    <li>School heeft vroegtijdig inzicht in mogelijk belemmerende factoren voor school- en werkloopbaan</li>
</ul>',
                'weergave_succesfactor'                      => 'We zorgen ervoor dat docenten vroegtijdig zicht hebben op belemmeringen, mogelijkheden en loopbaanwensen van de jongeren, zodat jongeren steeds goed worden begeleid in een richting die bij hen past.',
                'theme_id' => 2,
            ],
            [
                'title'                     => 'Betrokkenheid ouders',
                'body'              => 'De rol van ouders is zowel groot, als vaak onderbenut. Ouders steeds actief betrekken, informeren en vooral committeren en stimuleren (rol in de begeleiding).',
                'weergave_succesfactor'     => '<ul>
  <li>School betrekt ouders actief  bij de schoolloopbaan van de leerling door ze actief  te:
    <ul>
      <li>Informeren</li>
      <li>Stimuleren</li>
      <li>Committeren (doel en aanpak)</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'De impact van ouders wordt benut door hen echt te betrekken en stimulerende bondgenoot te maken.',
                'theme_id' => 2,
            ],
            [
                'title'                     => 'Continuïteit in begeleiding',
                'body'              => 'Continuïteit in begeleiding bij het verlaten van de school (tijdige, warme overdracht school – gemeente, nazorg school). ',
                'weergave_succesfactor'     => '<ul>
    <li>Tijdige, warme overdracht van school naar werk/ vervolgopleiding/ gemeente. </li>
    <li>Niet aansluitend, maar overlappend</li>
    <li>School verzorgt goede nazorg</li>
</ul>',
                'weergave_succesfactor'                      => 'Bij ons wordt het estafettestokje goed en tijdig overgedragen van school naar gemeente: tijdige, warme overdracht, met vroegtijdige rol van de gemeente en nazorg door de school.',
                'theme_id' => 2,
            ],
            [
                'title'                     => 'Gedeelde visie ',
                'body'              => 'Gedeelde visie van netwerkpartners ten aanzien van het realiseren van zo groot mogelijke werkkansen voor jongeren met LVB en ieders verantwoordelijkheid en rol daarbij.',
                'weergave_succesfactor'     => '<ul>
    <li>Gezamenlijke visie op arbeidstoeleiding van de jongeren</li>
    <li>Rollen en verantwoordelijkheden zijn bekend en worden erkend en benut</li>
</ul>',
                'weergave_succesfactor'                      => 'Netwerkpartners hebben een gedeelde visie op de arbeidstoeleiding van de jongeren en op verantwoordelijkheden en inzet van betrokken partijen.',
                'theme_id' => 3,
            ],
            [
                'title'                     => 'Periodiek (netwerk)overleg',
                'body'              => 'Netwerkpartners op ieder leefgebied zijn periodiek op verschillende niveaus met elkaar in gesprek over optimale samenwerking, onderlinge afhankelijkheden en inzet. Op beleidsniveau (ook in het kader van ieders beleids-/begrotingscyclus) en ook met heldere operationele samenwerkingsafspraken (contactpersonen, ‘leveringsafspraken’).',
                'weergave_succesfactor'     => '<ul>
  <li>Periodiek overleg op ieder leefgebied en op verschillende niveaus over de samenwerking.</li>
  <li>Dit leidt tot goede:
    <ul>
      <li>Beleids-en begroting afspraken </li>
      <li>Operationele afspraken</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'Er vindt tussen netwerkpartners structureel op verschillende niveaus (beleid, uitvoering) overleg plaats over de samenwerking.',
                'theme_id' => 3,
            ],
            [
                'title'                     => 'Effectief casemanagement',
                'body'              => 'Effectief casemanagement: helderheid over de regie door een docent/(traject)begeleider ten aanzien van de activiteiten van alle bij de begeleiding betrokken professionals. Met oog voor de noodzaak van gerichte begeleiding in veranderingen op verschillende levensgebieden (bijv. wonen, jeugdhulpverlening en inkomen).',
                'weergave_succesfactor'     => '<ul>
    <li>Helder is welke docent/ (traject)begeleider de regie heeft en het aanspreekpunt is</li>
    <li>Betreffende docent/ (traject)begeleider coördineert interventies op verschillend levensgebieden</li>
    <li>Ouders en jongeren ervaren geen verkokering</li>
</ul>',
                'weergave_succesfactor'                      => 'Het is helder welke docent of (traject)begeleider op welk moment de regie heeft. Deze persoon heeft het overzicht en coördineert de verschillende interventies naar de jongere toe.',
                'theme_id' => 3,
            ],
            [
                'title'                     => 'Samenwerking scholen',
                'body'              => 'VSO en PRO scholen in de regio zorgen ervoor dat er een voldoende eenduidige aanpak en samenwerking is ten behoeve van het vruchtbaar en efficiënt kunnen samenwerken met gemeenten.',
                'weergave_succesfactor'     => '<ul>
  <li>Scholen werken samen ten behoeve van een effectieve en efficiënte samenwerking met gemeenten door:
    <ul>
      <li>Eenduidige aanpak en werkwijze VSO en PRO scholen in de regio</li>
      <li>Goede samenwerking tussen VSO en PRO scholen in de regio</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'De VSO, PRO en Entree scholen werken zodanig samen dat er een goede, efficiënte samenwerking met gemeenten mogelijk is.
',
                'theme_id' => 3,
            ],
            [
                'title'                     => 'Samenwerking gemeenten',
                'body'              => 'Gemeenten in de regio zorgen er voor dat er een voldoende eenduidige aanpak is ten behoeve van het vruchtbaar en efficiënt kunnen samenwerken met VSO-  en PRO-scholen',
                'weergave_succesfactor'     => '<ul>
  <li>Gemeenten werken onderling samen ten behoeve van vruchtbare en efficiënte samenwerking met scholen door:
    <ul>
      <li>Eenduidige aanpak en werkwijze Gemeenten in de regio</li>
      <li>Goede samenwerking tussen Gemeenten in de regio</li>
    </ul>
  </li>
</ul>',
                'weergave_succesfactor'                      => 'De gemeenten werken zodanig samen dat er een goede, efficiënte samenwerking met de PRO, VSO en Entree scholen mogelijk is.',
                'theme_id' => 3,
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}

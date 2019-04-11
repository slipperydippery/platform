<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="voorbeeldmailLabel">Voorbeeld E-mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p><span><em>Hieronder zie je een voorbeeld van een e-mail die je kunt kopiëren en plakken. Als je de link ook meestuurt, kunnen jouw netwerkpartners zich direct aanmelden bij jouw sessie.</em></span></p>

        <p>Beste netwerkpartner,</p>

        <p>Graag wil ik u uitnodigen om mee te doen aan een groepsscan van de participatiescan. De participatiescan is een analyse- en actietool voor heldere regionale afspraken over effectieve samenwerking en begeleiding ten behoeve van jongeren in een kwetsbare positie. Deze tool helpt om gezamenlijk de sterktes en zwaktes in de huidige aanpak en noodzakelijke verbeteracties te bepalen.</p>

        <p>Daarmee kunnen we met meerdere partijen in de regio in gesprek gaan over het vergroten van kansen op de arbeidsmarkt voor jongeren in een kwetsbare positie.</p>

        <p>Klik op deze link om aan deze scan mee te doen: <a href="{{ Request::root() }}/groep/{{ $group->id }}/sluitaan/{{ $group->code }}">{{ Request::root() }}/groep/{{ $group->id }}/sluitaan/{{ $group->code }}</a></p>

        <p>De sessie staat gepland op: {{ date('d-m-Y', strtotime($scan->group->datetime)) }} om {{ date('H:i', strtotime($scan->group->datetime)) }}</p>

        <p>Ik neem binnenkort contact op voor een afspraak zodat we de scan gezamenlijk kunnen uitvoeren.</p>

        <p>Met vriendelijke groeten,</p>
        <p>(Afzender)</p>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
        </div>
    </div>
</div>
{literal}
    <h1>{{ titulo }}</h1>
    <ul id="list-aviones" class="list-group">
        <li v-for="avion in aviones" class="list-group-item list-group-item-secondary">
            <a v-bind:href="'avion/' + avion.id_avion">{{avion.nombre}}</a> 
        </li>
    </ul>
{/literal}
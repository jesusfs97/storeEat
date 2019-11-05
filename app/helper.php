<?php

function modoActivo($nombreRuta){
    return request()->routeIs($nombreRuta) ? 'active' : '';
}
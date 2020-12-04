<div class="search-container" id="search">
        <form action="{{route('kaina')}}" method="GET" role="search">
            <div class="input-group">
                <input type="text" value="{{request()->input('kaina1')}}" class="kainosPaieska" name="kaina1"  placeholder="Min kaina"> -
                <input type="text" value="{{request()->input('kaina2')}}" class="kainosPaieska" name="kaina2"  placeholder="Max kaina">&nbsp;
                <input type="text" value="{{request()->input('miestas')}}" class="miestoPaieska" name="miestas"  placeholder=" Miestas">
                <button type="submit" class="button search">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form></div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("услуги");
?>

. TEEM RANDER .
<script>
var teems,
    membs,
    step;
var ar_player = [];
var ar_teem = [];

function randomInteger(a, b) {
    if(a.rand < b.rand)
        return 1;
    if(a.rand > b.rand)
        return -1;
}

//start
teems = prompt('put number of teems','');
console.log( '. number of teems: ' + teems );

membs = prompt('put number of players','');
console.log( '. number of players: ' + membs );

if( !isNaN(teems) && !isNaN(membs) ){
    if( teems.length>0 && membs.length>0 ){
        if( +teems <= +membs ){
            step = Math.floor( +membs / +teems );
            step_left =  +membs % +teems;

            console.log( '. step: ' + step );
            console.log( '. step_left: ' + step_left );

            // var i = 0;
            for(i=0; i< membs; i++){
                ar_player[i] = {};
                ar_player[i].id = i;
                ar_player[i].name = prompt('put player[' + i + '] name','');
                ar_player[i].rand = Math.random();
            }
            ar_player.sort(randomInteger);
            console.log( 'sorting... \n\n' );
            console.log('\n . Players array');            
            console.log(ar_player);

            var player_it = 0;
            for(var i=0; i<teems; i++){
                var tem_ar = [];
                for(var j=0; j<step; j++){
                    tem_ar.push( ar_player[player_it] );

                    player_it++;
                }                
                ar_teem[i] = tem_ar;
            }
            if(step_left > 0){
                var teem_it = 0;
                for(var i=0; i<step_left; i++){
                    if(teem_it == teems){
                        teem_it = 0;
                    }
                    ar_teem[teem_it].push( ar_player[player_it] );
                    player_it++;
                    teem_it++;
                }                
            }
            console.log('\n . Teem array');
            console.log(ar_teem);

            for(var i=0; i<ar_teem.length; i++){
                console.log( '\n . Teem [' + i + ']');
                for(var j=0; j<ar_teem[i].length; j++){
                    console.log( ar_teem[i][j] );
                }
            }

            // var strings = [];
            // var teem_i = 1;
            // for(i=0; i< membs; i+step){

            //     console.log('= Teem[' + teem_i + ']:\n');

            //     for(var j=0; j< step; j++){
            //         if( ar_player[i] === undefined )
            //             break;
            //         strings[i] = '. id: ' + ar_player[i].id +
            //             ' name: [' + ar_player[i].name + ']' +
            //             ' rand: ' + ar_player[i].rand;
            //         console.log( strings[i] );
            //         i++;
            //     }
            //     teem_i++;
            // }

        }
        else{
            console.log( '! error, number of teems > number of players' );
        }
    }
    else{
        console.log( '! error, wrong action' );
    }
}
else{
    console.log( '! error, wrong var type' );
}
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

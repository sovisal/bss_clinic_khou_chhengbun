<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchoDefaultDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('echo_default_descriptions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name', 255);
          $table->string('slug', 255)->unique();
          $table->text('description');
          $table->timestamps();
      });

      
        // Insert some languages
        $echo_default_descriptions = [
            [
              'name' => 'Grossesse non évolué',
              'slug' => 'grossesse-non-evolue',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><u><span style="font-size:12.0pt">Technique</span></u><span style="font-size:12.0pt">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></span></p>

              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:12.0pt">Echographie pelvienne :</span></strong></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Ut&eacute;rus est gravide, pr&eacute;sence d&rsquo;un sac claire mesure d<strong>e: </strong></span><strong><span style="font-size:12.0pt">15.6</span></strong><strong><span style="font-size:12.0pt">mm</span></strong><span style="font-size:12.0pt"> avec sac d&eacute;form&eacute;.</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></span></p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:12.0pt">Conclusion </span></u></strong><strong><span style="font-size:12.0pt">: </span></strong><span style="font-size:12.0pt">Echographie pelvienne montre<strong> une grossesse arret&eacute;<span style="color:blue">.</span></strong></span></span></span></p>
              ',
            ],
            [
              'name' => 'Grossesse évolué',
              'slug' => 'grossesse-evolue',
              'description' => '<p style="margin-left:48px"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Nombre du f&oelig;tus (</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">ចំនួន</span></span><span style="font-size:14.0pt">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DDR&nbsp;: </span><span style="font-size:14.0pt">&nbsp;/&nbsp; / 2020</span></span></span></p>

              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><u><span style="font-size:12.0pt">Technique</span></u><span style="font-size:12.0pt">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Ut&eacute;rus est gravide de: mm DAP, pr&eacute;sence d&rsquo;un sac claire </span>&nbsp;<span style="font-size:12.0pt">mesure d<strong>e</strong></span><strong><span style="font-size:12.0pt">:</span></strong><strong><span style="font-size:12.0pt"> mm</span></strong><span style="font-size:12.0pt"> avec </span><span style="font-size:12.0pt">point de vitalit&eacute;</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></span></p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:12.0pt">Conclusion </span></u></strong><strong><span style="font-size:12.0pt">: </span></strong><span style="font-size:12.0pt">Echographie pelvienne montre<strong> une grossesse de:&nbsp; <span style="color:blue">SA J&nbsp;</span></strong></span><strong><span style="font-size:12.0pt"><span style="color:blue">vienn &eacute;volutive</span></span></strong><strong><span style="font-size:12.0pt"><span style="color:blue">.</span></span></strong></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:12.0pt"><span style="color:blue">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terme echographique&nbsp;:&nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- 1w0d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>
              ',
            ],
            [
              'name' => 'Echo abdominaleF',
              'slug' => 'echo-abdominalef',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:14.0pt">R&eacute;sultat </span></u></strong></span></span></p>

              <ul>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Le foie est de taille (FD&nbsp;: mm,FG&nbsp;: mm)&nbsp; de contours r&eacute;guliers, d&#39;&eacute;cho-structure homog&egrave;ne surface liss borde inf&eacute;rieux tranchante.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Le tronc porte et les veines sus-h&eacute;patiques sont dilat&eacute;.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">La v&eacute;sicule biliaire alithiasique, la paroi fine et r&eacute;guli&egrave;re.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Les voies biliaires intra et extra h&eacute;patiques sont &nbsp;dilat&eacute;es.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Le pancr&eacute;as est de tailles normales, de contours r&eacute;guliers. </span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">La rate est homog&egrave;ne, de taille normale. </span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Les reins de taille normale (RD: mm,RG:mm) la diff&eacute;renciation cortico-m&eacute;dullaire bien visible, absence de dilatations des cavit&eacute;s py&eacute;localicielles.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">La vessie an&eacute;chogene la paroi fine et absence de diverticule ni de calcul.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Ut&eacute;rus</span><span style="font-size:14.0pt">:ant&eacute;vers&eacute;</span><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​​</span></span><span style="font-size:14.0pt"> de 40mm de DAP ligne vacuit&eacute; r&eacute;guli&eacute;</span> </span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Annex :normale</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Douglas&nbsp;: libre.</span></span></span></li>
              </ul>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:14.0pt"><span style="color:blue">&nbsp;&nbsp;&nbsp;&nbsp; Au total</span></span></strong><span style="font-size:14.0pt"> : Echographie pelvienne normale</span></span></span></p>
              ',
            ],
            [
              'name' => 'Echo abdominaleM',
              'slug' => 'echo-abdominalem',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:14.0pt">R&eacute;sultat </span></u></strong></span></span></p>

              <ul>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Le foie est de taille (FD&nbsp;: mm,FG&nbsp;: mm)&nbsp; de contours r&eacute;guliers, d&#39;&eacute;cho-structure homog&egrave;ne surface liss borde inf&eacute;rieux tranchante .</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Le tronc porte et les veines sus-h&eacute;patiques sont perm&eacute;ables.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">La v&eacute;sicule biliaire alithiasique, la paroi fine et r&eacute;guli&egrave;re.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Les voies biliaires intra et extra h&eacute;patiques ne sont pas dilat&eacute;es.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Le pancr&eacute;as est de tailles normales, de contours r&eacute;guliers. </span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">La rate est homog&egrave;ne, de taille normale. </span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Les reins de taille normale (RD: mm,RG:mm) la diff&eacute;renciation cortico-m&eacute;dullaire bien visible, absence de dilatations des cavit&eacute;s py&eacute;localicielles</span><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​</span></span> </span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">La vessie an&eacute;chogene la paroi fine et absence de diverticule ni de calcul</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Prostat&nbsp;:normale</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Douglas&nbsp;: libre.</span></span></span></li>
                  <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:12.0pt">Gaz intent</span></span></span></li>
              </ul>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​​&nbsp;&nbsp;&nbsp; </span></span><strong><u><span style="font-size:14.0pt">Au total</span></u></strong><span style="font-size:14.0pt"> : Echographie abdominale normale a ce jour</span></span></span></p>
              ',
            ],
            [
              'name' => 'Echo SEIN',
              'slug' => 'echo-sein',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Nom et Pr&eacute;nom :&nbsp;&nbsp; </span></span></span></p>

              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Clinique : </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">M&eacute;decin demander&nbsp;:</span></span></span></p>
              
              <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:16.0pt">R&eacute;sultat </span></u></strong></span></span></p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tissue sous cutan&eacute;e et graisseuse sont normaux.</span></span></span></p>
              
              <p style="margin-left:48px"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Absence anomalie de morphologie et de structure de la glande mammaire.</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Absence ad&eacute;nopathie </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:14.0pt">Absence </span><span style="font-size:14.0pt">de calcification ou de formation tumorale .</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; La vascularisation est normale. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:14.0pt">Au total</span></u></strong><span style="font-size:14.0pt">: Echographie du seins sont normaeux.</span></span></span></p>
              ',
            ],
            [
              'name' => 'Echo thyroïdienne',
              'slug' => 'echo-thyroidienne',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Nom et pr&eacute;nom : &nbsp;</span></span></span></p>

              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Clinique :&nbsp; </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">M&eacute;decin demander&nbsp;: &nbsp;</span></span></span></p>
              
              <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:16.0pt">R&eacute;sultat </span></u></strong></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">La glande thyro&iuml;de est mesur&eacute;e&nbsp; au : &nbsp;</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:14.0pt">Lobe droit</span></strong><span style="font-size:14.0pt">&nbsp;: L&nbsp;: mm X&nbsp; L&rsquo; : mm X AP&nbsp;: mm&nbsp; </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:14.0pt">Lobe gauche</span></strong><span style="font-size:14.0pt">&nbsp;: L&nbsp;: mm X&nbsp; L&rsquo; : mm X AP&nbsp;: mm &nbsp;</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:14.0pt">Isthme&nbsp;</span></strong><span style="font-size:14.0pt">: &nbsp; mm en ant&eacute;ropost&eacute;rieur (AP).</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:14.0pt">Volume</span></strong><span style="font-size:14.0pt"> estim&eacute; &agrave;&nbsp; <strong>g</strong> pour un lobe [<strong><em>normal inf&eacute;rieur &agrave; 7g</em></strong>].</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">L&#39;&eacute;chostructure glandulaire est l&eacute;g&egrave;rement granuleuse, homog&egrave;ne et &eacute;chog&egrave;ne. Les contours de l&#39;isthme et de chaque lobe sont r&eacute;guliers.&nbsp;&nbsp; </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Diff&eacute;renciation de gradient musculo-parenchymateux.</span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Absence d&#39;ad&eacute;nopathie le long des axes jugulo-carotidiennes.&nbsp;&nbsp; </span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Pas d&#39;argument en faveur d&#39;une pathologie para-thyro&iuml;dienne.&nbsp;&nbsp; </span></span></span></p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><u><span style="font-size:14.0pt">Au total</span></u></strong><span style="font-size:14.0pt">: Echographie thyro&iuml;dienne normale.</span></span></span></p>
              ',
            ],
            [
              'name' => 'Obst 3 trimestre',
              'slug' => 'obst-3-trimestre',
              'description' => '<p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><u><span style="font-size:16.0pt"><span style="color:red">R&eacute;sultat</span></span></u></span></span></p>

              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<span style="font-size:14.0pt">&nbsp;&nbsp;Nombre du f&oelig;tus (</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">ចំនួន</span></span><span style="font-size:14.0pt">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DDR&nbsp;: </span><span style="font-size:14.0pt">&nbsp;/ &nbsp;/ 2020</span></span></span></p>
              
              <table cellspacing="0" class="Table" style="border-collapse:collapse; border:none; margin-left:73px">
                <tbody>
                  <tr>
                    <td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:162px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">Poids (</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">ទម្ងន់កូន</span></span><span style="font-size:14.0pt">):</span></span></span></p>
                    </td>
                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:168px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">DBP (</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">ទំហំក្បាល</span></span><span style="font-size:14.0pt">)</span></span></span></p>
                    </td>
                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:150px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">F</span><span style="font-size:14.0pt">L(</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">ប្រវែងភ្លៅកូន</span></span><span style="font-size:14.0pt">)</span></span></span></p>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:162px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">g</span></span></span></p>
                    </td>
                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:168px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">mm</span></span></span></p>
                    </td>
                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:150px">
                    <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:14.0pt">mm</span></span></span></p>
                    </td>
                  </tr>
                </tbody>
              </table>
              
              <ul>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;<span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">Absence anormalie morphologie d&eacute;c&eacute;lable<span style="color:red"> (</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">រូបរាងកូនគ្រប់លកិខណ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:red">:</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:red">)</span></span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Bonne movement <span style="color:red">(</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ចលនាកូនល្អ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:red">)</span></span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Activit&eacute; cardiaque (</span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ចលនាបេះដូងកូនល្អ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">):&nbsp; b/mn</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Bonne placenta (<span style="color:#bf8f00">សុកកូនល្អ</span>) post&eacute;rieux en haut( <span style="color:#bf8f00">នៅផ្នែកខាង</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ក្រោយខាងលើ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">)</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Pr&eacute;sentation(</span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ការបង្ហាញ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ទម្រង់</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">): sommet dose a G&nbsp; (</span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ក្បាលនៅខាងក្រោម</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">)</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">Cordon circulaire 2toure A/V du cou</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Liquide amniotique normale (<span style="color:#bf8f00">បរិមាណទឹកភ្លោះកូន ល្អគ្រប់គ្រាន់</span>) AFI: 13</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">&nbsp;Sex (ភេទ)&nbsp;: </span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:red">ស្រី ​ ប្រុស</span></span></span>&nbsp; </span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​ </span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">អាយុកូន</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ចំនួន</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">:</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">​​&nbsp; សប្ដាហ៍​និង​​ ថ្ងៃ​ </span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ការលូតលាស់ល្អ</span></span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">Les ovairese sont de taille et de morphologie normale, sans formation kystique a leur niveau.</span></span></span></span></li>
                <li><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">Abcence d&rsquo; &eacute;panchement dans le cul de sac de Douglas</span></span></span></span></li>
              </ul>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><u><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​</span></span></u>&nbsp;&nbsp;&nbsp; <strong><u><span style="font-size:14.0pt"><span style="color:#002060">Au total</span></span></u></strong><strong><span style="font-size:14.0pt">:</span></strong><span style="font-size:14.0pt">&Eacute;chographie pelvienne montrant de grossesse de(</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">អាយុកូនចំនួន</span></span></span><span style="font-size:14.0pt">):SA et:jours(</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#bf8f00">ថ្ងៃ</span></span></span><span style="font-size:14.0pt">)</span><strong> </strong></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:22.5pt"><span style="font-family:DaunPenh">​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style="font-size:14.0pt">Pr&eacute;sum&eacute; de terme le (</span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;"><span style="color:#ffc000">គ្រប់ខែនៅថ្ងៃទី</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS System&quot;">)</span></span><span style="font-size:14.0pt"><span style="color:#00b0f0">:</span></span> <strong><span style="font-size:12.0pt"><span style="color:#00b0f0">/&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- w</span></span></strong><span style="font-size:19.5pt"><span style="font-family:DaunPenh"><span style="color:#00b0f0">​</span></span></span><strong> </strong><strong><span style="font-size:12.0pt"><span style="color:#00b0f0">d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>
              ',
            ],
            [
              'name' => 'Hématologie analyse',
              'slug' => 'hematologie-analyse',
              'description' => '<p style="text-align:center"><u><span style="color:red">R&eacute;sultat</span></u></p>',
            ],
            [
              'name' => 'Letter from the hospital',
              'slug' => 'letter-form-the-hospital',
              'description' => '<p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><u><span style="font-size:14.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#44546a">លិខិតចេញពីមន្ទីសំរាកព្យាបាលនិងសម្ភព</span></span></span></u></span></span></p>

              <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#44546a">គ្រូពេទ្យព្យាបាលបញ្ជាក់ថា</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#00b0f0">​​​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">អ្នកជម្ងឺឈ្មោះ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:​​&nbsp; ​ស៊ា សុផល&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ភេទ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ស្រី&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;អាយុ​:&nbsp;&nbsp;&nbsp; ២២​&nbsp;&nbsp; ឆ្នាំ&nbsp;&nbsp;&nbsp;&nbsp; សញ្ជាតិ: ​ខ្មែរ</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;ថ្ងៃ&nbsp; ខែ ឆ្នាំ កំណើត</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:&nbsp;&nbsp;&nbsp;&nbsp; ១៨​ /០១/ ១៩៩៩&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ទីកន្លែងកំណើត​​​</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">: ភូមិ&nbsp; ផ្លាក​ ​​/ &nbsp;ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;មុខរបរ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;សន្តិសុខ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; អង្គភាព :</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ប្រពន្ធ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">ឈ្មោះ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:​&nbsp;&nbsp; ហឿន រីដា&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; អាយុ​:&nbsp;&nbsp;&nbsp; ២៤​&nbsp;&nbsp; ឆ្នាំ&nbsp;&nbsp;&nbsp;&nbsp; សញ្ជាតិ: ​ខ្មែរ</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;ទីកន្លែងកំណើត​​​: ភូមិ&nbsp; ផ្លាក​ ​​/&nbsp; ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ​មុខរបរ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:&nbsp;&nbsp; ចុងភៅ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;អង្គភាព :</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;អាស័យដ្ឋាន: ភូមិ&nbsp; ផ្លាក​ ​​/&nbsp; ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ចុលសំរាកព្យាបាល​ ថ្ងៃទី&nbsp; ១៩ ​ ខែ​&nbsp; មករា&nbsp;&nbsp; ឆ្នាំ​​​​&nbsp;&nbsp; ២០២០&nbsp;&nbsp; </span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ចេញសំរាកព្យាបាល​ ថ្ងៃទី ​​ ២១&nbsp; ខែ​ &nbsp;មករា&nbsp; ឆ្នាំ​​​​&nbsp;&nbsp; ២០២០</span></span></span>&nbsp;&nbsp; </span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;រោគវិនិច្ឆ័យ នៅពេលចូលសំរាក​</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:រលាកក្រពះធ្ងន់ធ្ង</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; រោគវិនិច្ឆ័យ នៅពេលចូលសំរាក</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:រលាកក្រពះធ្ងន់ធ្ង</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;សភាពអ្នកជម្ងឺនៅពេលចេញ</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:black">:ធូស្រាល</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<u><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:red">ចំណាំ</span></span></span></u><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:red">:</span></span></span><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#002060">សូមយកលិខិតចេញពីមន្ទីសំរាកព្យាបាលនេះដើម្បីសុំច្បាប់កន្លែងការងារតាមតម្រូវការ</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#002060">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ធ្វើនៅចំការលើ ថ្ងៃទី​​២១​ ខែ មករា ឆ្នាំ​២០២០</span></span></span></span></span></p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Siemreap&quot;"><span style="color:#002060">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; គ្រូពេទ្យព្យាបាល</span></span></span></span></span></p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              
              <p><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Khmer OS Muol Light&quot;"><span style="color:#002060">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;វេជ្ជបណ្ឌិត អ៊ុត ព្រង</span></span></span></span></span></p>
              ',
            ],
        ];
        DB::table('echo_default_descriptions')->insert($echo_default_descriptions);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echo_default_descriptions');
    }
}

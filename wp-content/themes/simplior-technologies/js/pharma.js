/* Criterion Edge — Pharmaceutical (CD Tool) */

(function(){
  var B=document.querySelectorAll('.stab-label'),P=document.querySelectorAll('.stab-panel');
  function sw(i){B.forEach(function(b){b.classList.remove('active')});P.forEach(function(p){p.classList.remove('active')});if(B[i])B[i].classList.add('active');if(P[i])P[i].classList.add('active');}
  B.forEach(function(b,i){b.addEventListener('click',function(){sw(i)});});
  var D=[{n:'◆ IND Application',s:0,sn:'Regulatory'},{n:'◆ NDA / BLA Submissions',s:0,sn:'Regulatory'},{n:'◆ MAA Submissions',s:0,sn:'Regulatory'},{n:'◆ eCTD Module 2 Summaries',s:0,sn:'Regulatory'},{n:'Target Product Profile',s:0,sn:'Regulatory'},{n:'Mechanism of Action',s:0,sn:'Regulatory'},{n:'Regulatory Strategy Documents',s:0,sn:'Regulatory'},{n:'Pre-IND Meeting Request',s:0,sn:'Regulatory'},{n:'Pre-IND Briefing Document',s:0,sn:'Regulatory'},{n:'Investigator\'s Brochure (IB)',s:0,sn:'Regulatory'},{n:'Clinical Development Plan',s:0,sn:'Regulatory'},{n:'Clinical Trial Application (CTA)',s:0,sn:'Regulatory'},{n:'CTA Submissions',s:0,sn:'Regulatory'},{n:'IMPD Preparation',s:0,sn:'Regulatory'},{n:'Orphan Drug Designation / Applications',s:0,sn:'Regulatory'},{n:'Breakthrough Therapy Designation',s:0,sn:'Regulatory'},{n:'Fast Track Designation / Applications',s:0,sn:'Regulatory'},{n:'Pediatric Investigation Plan',s:0,sn:'Regulatory'},{n:'FDA Meeting Minutes',s:0,sn:'Regulatory'},{n:'Scientific Advice Requests',s:0,sn:'Regulatory'},{n:'Response to FDA Questions',s:0,sn:'Regulatory'},{n:'Regulatory Response Letters',s:0,sn:'Regulatory'},{n:'Clinical Hold Responses',s:0,sn:'Regulatory'},{n:'Clinical Overview (Module 2.5)',s:0,sn:'Regulatory'},{n:'Clinical Summary (Module 2.7)',s:0,sn:'Regulatory'},{n:'Nonclinical Overview (Module 2.4)',s:0,sn:'Regulatory'},{n:'Quality Overall Summary (Module 2.3)',s:0,sn:'Regulatory'},{n:'NDA / BLA Modules',s:0,sn:'Regulatory'},{n:'Briefing Documents',s:0,sn:'Regulatory'},{n:'Advisory Committee Briefing',s:0,sn:'Regulatory'},{n:'eCTD Publishing Support',s:0,sn:'Regulatory'},{n:'Annual Reports',s:0,sn:'Regulatory'},{n:'Label Supplements',s:0,sn:'Regulatory'},{n:'Line Extension Support',s:0,sn:'Regulatory'},{n:'Variation Applications',s:0,sn:'Regulatory'},{n:'Renewal Applications',s:0,sn:'Regulatory'},{n:'◆ Nonclinical Study Reports',s:1,sn:'Preclinical'},{n:'Nonclinical Study Protocols',s:1,sn:'Preclinical'},{n:'Pharmacology Studies / Reports',s:1,sn:'Preclinical'},{n:'Toxicology Studies / Reports',s:1,sn:'Preclinical'},{n:'Safety Pharmacology',s:1,sn:'Preclinical'},{n:'PK/TK Studies',s:1,sn:'Preclinical'},{n:'ADME Studies',s:1,sn:'Preclinical'},{n:'Genotoxicity Reports',s:1,sn:'Preclinical'},{n:'Carcinogenicity Protocols',s:1,sn:'Preclinical'},{n:'Reproductive Tox Reports',s:1,sn:'Preclinical'},{n:'Biocompatibility Reports',s:1,sn:'Preclinical'},{n:'Animal Study Reports',s:1,sn:'Preclinical'},{n:'GLP Compliance Documentation',s:1,sn:'Preclinical'},{n:'Proof of Concept Reports',s:1,sn:'Preclinical'},{n:'Feasibility Studies',s:1,sn:'Preclinical'},{n:'Biomarker Validation',s:1,sn:'Preclinical'},{n:'Dose Selection Rationale',s:1,sn:'Preclinical'},{n:'Nonclinical Summary',s:1,sn:'Preclinical'},{n:'CMC Documentation',s:1,sn:'Preclinical'},{n:'Gap Analysis',s:1,sn:'Preclinical'},{n:'Pharmacokinetic Summaries',s:1,sn:'Preclinical'},{n:'Pharmacodynamic Summaries',s:1,sn:'Preclinical'},{n:'◆ Clinical Study Protocol',s:2,sn:'Clinical'},{n:'◆ Clinical Study Report (CSR)',s:2,sn:'Clinical'},{n:'◆ Integrated Summary of Safety (ISS)',s:2,sn:'Clinical'},{n:'◆ Integrated Summary of Efficacy (ISE)',s:2,sn:'Clinical'},{n:'First-in-Human Protocol',s:2,sn:'Clinical'},{n:'Protocol Amendments',s:2,sn:'Clinical'},{n:'Statistical Analysis Plan',s:2,sn:'Clinical'},{n:'Informed Consent Form',s:2,sn:'Clinical'},{n:'Case Report Forms',s:2,sn:'Clinical'},{n:'Pediatric Study Plans',s:2,sn:'Clinical'},{n:'Data Safety Monitoring Board Charter',s:2,sn:'Clinical'},{n:'Clinical Hold Responses',s:2,sn:'Clinical'},{n:'Interim Analysis Reports',s:2,sn:'Clinical'},{n:'PK/PD Reports',s:2,sn:'Clinical'},{n:'Patient Narratives',s:2,sn:'Clinical'},{n:'Pharmacokinetic Summaries',s:2,sn:'Clinical'},{n:'Pharmacodynamic Summaries',s:2,sn:'Clinical'},{n:'Briefing Documents',s:2,sn:'Clinical'},{n:'Advisory Committee Briefing',s:2,sn:'Clinical'},{n:'REMS Proposals',s:2,sn:'Clinical'},{n:'Labeling Development',s:2,sn:'Clinical'},{n:'Labeling Updates',s:2,sn:'Clinical'},{n:'Response to Complete Response',s:2,sn:'Clinical'},{n:'Approval Package Review',s:2,sn:'Clinical'},{n:'Benefit-Risk Analysis',s:2,sn:'Clinical'},{n:'◆ PSUR / PBRER',s:3,sn:'Post-Market Approval'},{n:'◆ DSUR',s:2,sn:'Clinical'},{n:'Risk Management Plan (RMP)',s:3,sn:'Post-Market Approval'},{n:'REMS / REMS Documentation',s:3,sn:'Post-Market Approval'},{n:'Signal Detection Reports',s:3,sn:'Post-Market Approval'},{n:'Aggregate Safety Reports',s:3,sn:'Post-Market Approval'},{n:'Individual Case Safety Reports',s:3,sn:'Post-Market Approval'},{n:'Labeling Updates',s:3,sn:'Post-Market Approval'},{n:'Dear Healthcare Provider Letters',s:3,sn:'Post-Market Approval'},{n:'Benefit-Risk Updates',s:3,sn:'Post-Market Approval'},{n:'SmPC Updates',s:3,sn:'Post-Market Approval'},{n:'Package Insert Updates',s:3,sn:'Post-Market Approval'}],si=document.getElementById('srch'),sr=document.getElementById('srchR');
  si.addEventListener('input',function(){
    var q=this.value.toLowerCase().trim();sr.innerHTML='';
    document.querySelectorAll('.mrow.highlighted').forEach(function(e){e.classList.remove('highlighted')});
    if(q.length<2){sr.classList.remove('active');return;}
    var m=D.filter(function(d){return d.n.toLowerCase().indexOf(q)!==-1});
    if(!m.length){sr.innerHTML='<div class="sr-empty">No results</div>';sr.classList.add('active');return;}
    m.forEach(function(it){
      var d=document.createElement('div');d.className='sr-item';
      d.innerHTML='<h6>'+it.n.replace(/◆ /g,'')+'</h6><div class="ext-tag 1234567890"><span>'+it.sn+'</span><span>Pharmaceutical</span></div>';
      d.onclick=function(){sw(it.s);setTimeout(function(){
        document.querySelectorAll('.mrow.highlighted').forEach(function(e){e.classList.remove('highlighted')});
        var rows=document.querySelectorAll('.stab-panel.active .mname');
        for(var r=0;r<rows.length;r++){if(rows[r].textContent.indexOf(it.n.replace('◆ ',''))!==-1){var mr=rows[r].closest('.mrow');if(mr){mr.classList.add('highlighted');mr.scrollIntoView({behavior:'smooth',block:'center'});break;}}}
      },150);sr.classList.remove('active');si.value=it.n.replace('◆ ','');};sr.appendChild(d);
    });sr.classList.add('active');
  });
  document.addEventListener('click',function(e){if(!e.target.closest('.search-box'))sr.classList.remove('active')});
  document.querySelectorAll('.cat-row').forEach(function(c){c.addEventListener('click',function(){
    this.classList.toggle('collapsed');var n=this.nextElementSibling;
    while(n&&!n.classList.contains('cat-row')&&!n.classList.contains('ph-row')){n.style.display=this.classList.contains('collapsed')?'none':'';n=n.nextElementSibling;}
  })});
})(); 

  // Deliverable dropdown toggle
  document.querySelectorAll('.mrow').forEach(function(row){
    row.addEventListener('click',function(e){
      // Don't toggle if clicking a link inside
      if(e.target.closest('a')) return;
      var desc=this.nextElementSibling;
      if(desc && desc.classList.contains('deliverable-desc')){
        this.classList.toggle('expanded');
        desc.classList.toggle('open');
      }
    });
  });

(function(){
  var btn = document.getElementById('cd-help-toggle');
  var panel = document.getElementById('cd-help-panel');
  if (btn && panel) {
    btn.addEventListener('click', function(){
      panel.classList.toggle('open');
      btn.classList.toggle('active');
    });
  }
})();

(function(){
  var sel = document.getElementById('cd-area');
  if (sel) {
    sel.addEventListener('change', function(){
      if (this.value) window.location.href = this.value;
    });
  }
})();


(function(){
  var tabs = document.querySelectorAll('#ws-demo-tabs .mini-tab');
  var panels = document.querySelectorAll('#ws-demo-panel .ws-panel-content');
  var cursor = document.getElementById('ws-demo-cursor');
  var ring = document.getElementById('ws-demo-ring');
  if (!tabs.length || !cursor || !ring) return;

  var current = 0;
  var initialized = false;

  function positionCursorOverTab(idx) {
    var tab = tabs[idx];
    if (!tab) return;
    var tabRect = tab.getBoundingClientRect();
    var demoRect = document.querySelector('.ws-demo').getBoundingClientRect();
    var x = tabRect.left - demoRect.left + tabRect.width / 2 - 4;
    var y = tabRect.top - demoRect.top + tabRect.height / 2 - 2;
    cursor.style.left = x + 'px';
    cursor.style.top = y + 'px';
  }

  function fireRing(idx) {
    var tab = tabs[idx];
    var tabRect = tab.getBoundingClientRect();
    var demoRect = document.querySelector('.ws-demo').getBoundingClientRect();
    var x = tabRect.left - demoRect.left + tabRect.width / 2 - 12;
    var y = tabRect.top - demoRect.top + tabRect.height / 2 - 12;
    ring.style.left = x + 'px';
    ring.style.top = y + 'px';
    ring.classList.remove('fire');
    void ring.offsetWidth;
    ring.classList.add('fire');
  }

  function activate(idx) {
    tabs.forEach(function(t,i){ t.classList.toggle('active', i === idx); });
    panels.forEach(function(p,i){ p.classList.toggle('active', i === idx); });
  }

  function step() {
    var next = (current + 1) % tabs.length;
    positionCursorOverTab(next);
    setTimeout(function(){
      fireRing(next);
      setTimeout(function(){
        activate(next);
        current = next;
      }, 120);
    }, 720);
  }

  function start() {
    if (initialized) return;
    initialized = true;
    positionCursorOverTab(0);
    setInterval(step, 2200);
  }

  // Only animate when help panel is open and demo is visible
  var helpBtn = document.getElementById('cd-help-toggle');
  var helpPanel = document.getElementById('cd-help-panel');
  if (helpBtn && helpPanel) {
    helpBtn.addEventListener('click', function(){
      // Wait for the panel to open before measuring positions
      setTimeout(function(){
        if (helpPanel.classList.contains('open')) start();
      }, 50);
    });
  }
})();


(function(){
  var row = document.getElementById('dd-demo-row');
  var desc = document.getElementById('dd-demo-desc');
  var cursor = document.getElementById('dd-demo-cursor');
  var ring = document.getElementById('dd-demo-ring');
  if (!row || !desc || !cursor || !ring) return;

  var initialized = false;
  var isOpen = false;

  function getDemoRect() {
    return document.querySelector('.dd-demo').getBoundingClientRect();
  }

  function moveCursorToArrow() {
    var arrow = row.querySelector('.dd-arrow');
    if (!arrow) return;
    var aRect = arrow.getBoundingClientRect();
    var dRect = getDemoRect();
    var x = aRect.left - dRect.left + aRect.width / 2 - 4;
    var y = aRect.top - dRect.top + aRect.height / 2 - 2;
    cursor.style.left = x + 'px';
    cursor.style.top = y + 'px';
  }

  function moveCursorAway() {
    // Park cursor above-left of the row when hidden
    var dRect = getDemoRect();
    cursor.style.left = (dRect.width - 80) + 'px';
    cursor.style.top  = '-30px';
  }

  function fireRing() {
    var arrow = row.querySelector('.dd-arrow');
    var aRect = arrow.getBoundingClientRect();
    var dRect = getDemoRect();
    var x = aRect.left - dRect.left + aRect.width / 2 - 12;
    var y = aRect.top - dRect.top + aRect.height / 2 - 12;
    ring.style.left = x + 'px';
    ring.style.top = y + 'px';
    ring.classList.remove('fire');
    void ring.offsetWidth;
    ring.classList.add('fire');
  }

  function toggle() {
    isOpen = !isOpen;
    row.classList.toggle('expanded', isOpen);
    row.classList.toggle('collapsed', !isOpen);
    desc.classList.toggle('open', isOpen);
  }

  function step() {
    moveCursorToArrow();
    setTimeout(function(){
      fireRing();
      setTimeout(function(){
        toggle();
      }, 120);
    }, 720);
  }

  function start() {
    if (initialized) return;
    initialized = true;
    moveCursorToArrow();
    setInterval(step, 2400);
  }

  var helpBtn = document.getElementById('cd-help-toggle');
  var helpPanel = document.getElementById('cd-help-panel');
  if (helpBtn && helpPanel) {
    helpBtn.addEventListener('click', function(){
      setTimeout(function(){
        if (helpPanel.classList.contains('open')) start();
      }, 50);
    });
  }
})();


(function(){
  var demo = document.querySelector('.sr-demo');
  if (!demo) return;
  var typed = demo.querySelector('.sr-typed');
  var results = document.getElementById('sr-demo-results');
  var items = document.querySelectorAll('#sr-demo-results .sr-item');
  var searchWrap = demo.querySelector('.mini-search');
  var cursor = document.getElementById('sr-demo-cursor');
  var ring = document.getElementById('sr-demo-ring');
  if (!typed || !results || !cursor || !ring || !items.length) return;

  var word = 'IND';
  var initialized = false;

  function demoRect(){ return demo.getBoundingClientRect(); }

  function parkCursor(){
    var dr = demoRect();
    cursor.style.left = (dr.width - 40) + 'px';
    cursor.style.top = (dr.height - 30) + 'px';
  }

  function cursorTo(el, offsetX, offsetY){
    var r = el.getBoundingClientRect();
    var dr = demoRect();
    cursor.style.left = (r.left - dr.left + (offsetX || r.width/2) - 4) + 'px';
    cursor.style.top = (r.top - dr.top + (offsetY || r.height/2) - 2) + 'px';
  }

  function fireRingAt(el){
    var r = el.getBoundingClientRect();
    var dr = demoRect();
    ring.style.left = (r.left - dr.left + r.width/2 - 12) + 'px';
    ring.style.top = (r.top - dr.top + r.height/2 - 12) + 'px';
    ring.classList.remove('fire');
    void ring.offsetWidth;
    ring.classList.add('fire');
  }

  function reset(){
    typed.textContent = '';
    results.classList.remove('open');
    items.forEach(function(i){ i.classList.remove('highlight'); });
  }

  function loop(){
    // Step 0: reset state — cursor off-screen, empty search, closed results, default row label
    reset();
    // Park cursor below-right (off-screen effect)
    var dr = demoRect();
    cursor.style.transition = 'none';
    cursor.style.left = (dr.width + 40) + 'px';
    cursor.style.top  = (dr.height + 40) + 'px';
    var targetName = document.getElementById('sr-target-name');
    var targetRow = document.getElementById('sr-target-row');
    if (targetName) targetName.innerHTML = 'Document Name';
    if (targetRow) targetRow.classList.remove('flash');
    
    // Re-enable transition after 1 frame so cursor glides in smoothly
    setTimeout(function(){
      cursor.style.transition = '';
    }, 30);

    // Step 1: cursor glides in from off-screen to search box
    setTimeout(function(){
      cursorTo(searchWrap, 40, 19);
    }, 500);

    // Step 2: click search box
    setTimeout(function(){
      fireRingAt(searchWrap);
    }, 1400);

    // Step 3: type 'IND' letter by letter
    var i = 0;
    function typeNext(){
      if (i < word.length) {
        typed.textContent = word.substring(0, i+1);
        i++;
        setTimeout(typeNext, 240);
      } else {
        // Step 4: results panel appears
        setTimeout(function(){
          results.classList.add('open');
        }, 400);

        // Step 5: cursor glides down to the IND Application result
        setTimeout(function(){
          cursorTo(items[0]);
        }, 1200);

        // Step 6: click result (highlight + ring)
        setTimeout(function(){
          items[0].classList.add('highlight');
          fireRingAt(items[0]);
        }, 2100);

        // Step 7: mini table row updates to "IND Application" with orange flash
        setTimeout(function(){
          if (targetName) targetName.innerHTML = 'IND Application';
          if (targetRow) {
            targetRow.classList.add('flash');
          }
        }, 2700);

        // Step 8: hold for ~1.2 seconds so user can absorb the result
        // (nothing happens here, the loop interval handles restart)
      }
    }
    setTimeout(typeNext, 1800);
  }

  function start(){
    if (initialized) return;
    initialized = true;
    loop();
    setInterval(loop, 7500);
  }

  var helpBtn = document.getElementById('cd-help-toggle');
  var helpPanel = document.getElementById('cd-help-panel');
  if (helpBtn && helpPanel) {
    helpBtn.addEventListener('click', function(){
      setTimeout(function(){
        if (helpPanel.classList.contains('open')) start();
      }, 50);
    });
  }
})();

(function(){
  var demo = document.querySelector('.sa-demo');
  if (!demo) return;
  var dropdown = document.getElementById('sa-demo-dropdown');
  var select = demo.querySelector('.sa-select');
  var label = document.getElementById('sa-demo-label');
  var options = demo.querySelectorAll('.sa-option');
  var cursor = document.getElementById('sa-demo-cursor');
  var ring = document.getElementById('sa-demo-ring');
  if (!dropdown || !cursor || !ring || !options.length) return;

  var cycleOptions = ['Medical Device', 'Pharmaceutical'];
  var cycleIdx = 0;
  var initialized = false;

  function demoRect(){ return demo.getBoundingClientRect(); }

  function parkCursor(){
    var dr = demoRect();
    cursor.style.left = (dr.width - 40) + 'px';
    cursor.style.top = (dr.height - 30) + 'px';
  }

  function cursorTo(el){
    var r = el.getBoundingClientRect();
    var dr = demoRect();
    cursor.style.left = (r.left - dr.left + r.width/2 - 4) + 'px';
    cursor.style.top = (r.top - dr.top + r.height/2 - 2) + 'px';
  }

  function fireRingAt(el, alignRight){
    var r = el.getBoundingClientRect();
    var dr = demoRect();
    var x = (r.left - dr.left + r.width/2 - 12);
    ring.style.left = x + 'px';
    ring.style.top = (r.top - dr.top + r.height/2 - 12) + 'px';
    ring.classList.remove('fire');
    void ring.offsetWidth;
    ring.classList.add('fire');
  }

  function findOption(val){
    for (var i = 0; i < options.length; i++) {
      if (options[i].getAttribute('data-val') === val) return options[i];
    }
    return null;
  }

  function clearHighlight(){
    options.forEach(function(o){ o.classList.remove('highlight'); });
  }

  function loop(){
    // Pick next target
    var target = cycleOptions[cycleIdx % cycleOptions.length];
    cycleIdx++;

    parkCursor();
    clearHighlight();
    dropdown.classList.remove('open');

    // Step 1: cursor to select
    setTimeout(function(){ cursorTo(select); }, 400);

    // Step 2: click to open
    setTimeout(function(){ fireRingAt(select, true); }, 1300);
    setTimeout(function(){ dropdown.classList.add('open'); }, 1450);

    // Step 3: cursor moves to target option (slower, giving menu time to be seen)
    var targetOption = findOption(target);
    setTimeout(function(){
      if (targetOption) {
        var r = targetOption.getBoundingClientRect();
        var dr = demoRect();
        cursor.style.left = (r.left - dr.left + r.width/2 - 4) + 'px';
        cursor.style.top = (r.top - dr.top + r.height/2 - 2) + 'px';
        targetOption.classList.add('highlight');
      }
    }, 2600);

    // Step 4: click option, label updates, close dropdown (after a longer hold)
    setTimeout(function(){ if (targetOption) fireRingAt(targetOption); }, 4200);
    setTimeout(function(){
      if (targetOption) {
        label.textContent = target;
        var subtitle = document.getElementById('sa-demo-subtitle');
        if (subtitle) subtitle.textContent = target + ' Deliverables';
        
        // Swap workstream tabs based on service area
        var tabLabels = (target === 'Medical Device')
          ? ['Regulatory', 'Design & Development', 'Clinical', 'Post-Market']
          : ['Regulatory', 'Preclinical', 'Clinical', 'Post-Market'];
        for (var ti = 0; ti < 4; ti++) {
          var t = document.getElementById('sa-demo-tab-' + ti);
          if (t) t.textContent = tabLabels[ti];
        }
        
        // Swap the mini table rows so bar positions visibly change
        var table = document.getElementById('sa-demo-table');
        if (table) {
          var phRowPharma = '<div class="mini-ph-row"><div class="mini-ph-blank"></div><div class="mini-ph-cell">Pre-IND</div><div class="mini-ph-cell">IND</div><div class="mini-ph-cell">NDA</div><div class="mini-ph-cell">Post</div></div>';
          var phRowDevice = '<div class="mini-ph-row"><div class="mini-ph-blank"></div><div class="mini-ph-cell">Preclinical</div><div class="mini-ph-cell">Reg Enabling</div><div class="mini-ph-cell">Market Auth</div><div class="mini-ph-cell">Post-Market</div></div>';
          var phRow = (target === 'Medical Device') ? phRowDevice : phRowPharma;
          var pharmaRows =
            '<div class="mini-mrow mini-mrow-target"><div class="dd-name">Document</div><div class="mini-mcell"><div class="mini-bar key"></div></div><div class="mini-mcell"></div><div class="mini-mcell"></div><div class="mini-mcell"></div></div>' +
            '<div class="mini-mrow"><div class="mini-name-sup"></div><div class="mini-mcell"><div class="mini-bar sup"></div></div><div class="mini-mcell"><div class="mini-bar sup"></div></div><div class="mini-mcell"></div><div class="mini-mcell"></div></div>' +
            '<div class="mini-mrow"><div class="mini-name-sup"></div><div class="mini-mcell"></div><div class="mini-mcell"><div class="mini-bar sup"></div></div><div class="mini-mcell"></div><div class="mini-mcell"></div></div>';
          var deviceRows =
            '<div class="mini-mrow mini-mrow-target"><div class="dd-name">Document</div><div class="mini-mcell"></div><div class="mini-mcell"></div><div class="mini-mcell"><div class="mini-bar key"></div></div><div class="mini-mcell"></div></div>' +
            '<div class="mini-mrow"><div class="mini-name-sup"></div><div class="mini-mcell"></div><div class="mini-mcell"><div class="mini-bar sup"></div></div><div class="mini-mcell"><div class="mini-bar sup"></div></div><div class="mini-mcell"></div></div>' +
            '<div class="mini-mrow"><div class="mini-name-sup"></div><div class="mini-mcell"></div><div class="mini-mcell"></div><div class="mini-mcell"></div><div class="mini-mcell"><div class="mini-bar sup"></div></div></div>';
          table.innerHTML = phRow + (target === 'Medical Device' ? deviceRows : pharmaRows);
        }
        
        dropdown.classList.remove('open');
        clearHighlight();
      }
    }, 4500);
  } 

  function start(){
    if (initialized) return;
    initialized = true;
    parkCursor();
    loop();
    setInterval(loop, 7000);
  }

  var helpBtn = document.getElementById('cd-help-toggle');
  var helpPanel = document.getElementById('cd-help-panel');
  if (helpBtn && helpPanel) {
    helpBtn.addEventListener('click', function(){
      setTimeout(function(){
        if (helpPanel.classList.contains('open')) start();
      }, 50);
    });
  }
})(); 

jQuery(document).ready(function($){
    console.log("load");
    $('#srch').keyup(function(){
        let keyword = $(this).val();
        console.log("keyword"+keyword);
        if(keyword.length < 2){
            $('#srchR').html('');
            return;
        }

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'service_search',
                keyword: keyword,
                post_id: 9306   
            },
            success: function(response){
              console.log("success");
                $('#srchR').html(response);
            }
        });
    });

});
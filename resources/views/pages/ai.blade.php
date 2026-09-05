@extends('layouts.app')

@section('title', 'AI Solutions & Document Intelligence — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">
      CTS Neural Engine
    </span>
    <h1 class="hero-title">Add True Intelligence to <br><span class="gradient-accent">Everyday Enterprise Operations.</span></h1>
    <p class="section-subtitle mx-auto">
      Move beyond generic chat wrappers. We architect verified Retrieval-Augmented Generation (RAG) knowledge systems, automated invoice document parsing, and predictive business alerts.
    </p>

    <div style="display:flex; justify-content:center; gap:16px;">
      <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-lg">
        Deploy Custom AI Workflow
      </button>
    </div>
  </div>
</section>

<!-- Interactive Live Demo & Dark AI Card -->
<section class="section" style="padding-top:20px;">
  <div class="container">
    <div style="background:#000000; color:#ffffff; border-radius:var(--apple-radius-xl); padding:48px 40px; box-shadow:var(--apple-shadow-card); position:relative; overflow:hidden;">
      <div class="grid grid-2" style="align-items:center; gap:40px; position:relative; z-index:1;">
        <div>
          <span class="eyebrow" style="color:var(--apple-orange);">Interactive Simulation</span>
          <h2 style="font-size:2.2rem; font-weight:700; color:white; margin:8px 0 16px;">Test the CTS Semantic Pipeline</h2>
          <p style="color:#a1a1a6; font-size:1rem; line-height:1.6; margin-bottom:24px;">
            Simulate how our vector embeddings and language pipelines respond to queries across ERP records, employee policies, or invoice data.
          </p>

          <div style="display:flex; flex-direction:column; gap:12px; margin-bottom:24px; font-size:0.92rem; color:#d2d2d7;">
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#34c759; font-weight:bold;">✓</span> Strict citation grounding — zero hallucinations on business records.
            </div>
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#34c759; font-weight:bold;">✓</span> Secure on-prem or isolated private cloud database storage.
            </div>
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#34c759; font-weight:bold;">✓</span> Sub-second response times with optimized indexing.
            </div>
          </div>
        </div>

        <div>
          <div style="background:rgba(255, 255, 255, 0.06); border:1px solid rgba(255, 255, 255, 0.15); border-radius:20px; padding:28px; backdrop-filter:blur(20px);">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.1);">
              <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:10px; height:10px; border-radius:50%; background:#34c759;"></div>
                <span style="font-size:0.85rem; font-weight:700; color:#ffffff;">DocIntel & ERP AI Engine</span>
              </div>
              <span style="font-size:0.75rem; color:#86868b; font-family:monospace;">LATENCY: 42ms</span>
            </div>

            <div id="aiDemoResponse" style="min-height:110px; font-size:0.95rem; color:#ffffff; line-height:1.6; margin-bottom:20px; background:rgba(0,0,0,0.4); padding:16px; border-radius:12px; border:1px solid rgba(255,255,255,0.08);">
              <em style="color:#86868b;">Click any sample question or type your own business automation query below...</em>
            </div>

            <!-- Quick Questions -->
            <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:16px;">
              <button onclick="document.getElementById('aiDemoInput').value='How does AI parse supplier invoices?'; document.getElementById('aiDemoSubmit').click();" style="font-size:0.78rem; background:rgba(255,255,255,0.12); border:none; color:#d2d2d7; padding:6px 12px; border-radius:980px; cursor:pointer;">
                "How does AI parse invoices?"
              </button>
              <button onclick="document.getElementById('aiDemoInput').value='How does AI optimize ERP payroll and attendance?'; document.getElementById('aiDemoSubmit').click();" style="font-size:0.78rem; background:rgba(255,255,255,0.12); border:none; color:#d2d2d7; padding:6px 12px; border-radius:980px; cursor:pointer;">
                "AI in ERP payroll?"
              </button>
            </div>

            <div style="display:flex; gap:10px;">
              <input type="text" id="aiDemoInput" placeholder="Type a scenario (e.g. document extraction)..." style="flex:1; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); border-radius:12px; padding:12px 16px; color:white; font-size:0.92rem;">
              <button id="aiDemoSubmit" class="apple-btn apple-btn-primary" style="padding:10px 20px;">
                <span id="aiDemoSpinner" style="display:none;">⏳</span>
                Execute
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- AI Use Cases -->
<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="text-center" style="margin-bottom:48px;">
      <span class="eyebrow">Enterprise Solutions</span>
      <h2 class="section-title">Core AI Capabilities We Build</h2>
    </div>

    <div class="grid grid-3">
      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">📄</div>
        <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:10px; color:var(--apple-text-primary);">DocIntel OCR & Parsing</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          Automatically convert paper invoices, transport bills, and employee ID proofs into structured JSON database records with zero manual transcription errors.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">🧠</div>
        <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:10px; color:var(--apple-text-primary);">Enterprise RAG Knowledge</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          Equip your HR, support, and sales teams with an AI assistant trained strictly on your internal policies, standard operating procedures, and product manuals.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">📈</div>
        <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:10px; color:var(--apple-text-primary);">Predictive Operations</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          Identify attendance anomalies, inventory stockout risks, and project deadline bottlenecks before they impact delivery.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection

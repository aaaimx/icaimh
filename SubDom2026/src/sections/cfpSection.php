<!-- ======= Start of Call for Papers Section ======= -->
<section id="cfp" class="about">
  <div class="container my-5">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center mb-4">Call for Papers</h1>

        <p>
          The International Conference on Artificial Intelligence for
          Mental Health (ICAIMH) 2026 invites submissions that explore the
          transformative role of artificial intelligence in mental health.
          ICAIMH brings together researchers, practitioners, and industry
          professionals from AI, psychology, psychiatry, and healthcare to
          address the latest advancements, challenges, and ethical
          considerations in AI-driven mental health applications.
        </p>

        <?php
        include('src/components/cfpCardComponent.php');

        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>
          We welcome full and short papers on topics including, but
          not limited to:
        </p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            AI-driven prevention, detection, and treatment of mental
            health conditions
          </li>
          <li class="list-group-item">
            Natural language processing for emotion or mental health
            condition recognition
          </li>
          <li class="list-group-item">
            Intelligent agents and chatbots for mental health support
          </li>
          <li class="list-group-item">
            Expert systems in psychology and psychiatry
          </li>
          <li class="list-group-item">
            Computer vision and digital image processing in
            neuroimaging
          </li>
          <li class="list-group-item">
            Ethical considerations in AI for mental health
          </li>
          <li class="list-group-item">
            Human-Computer Interaction in AI-driven mental health
            tools
          </li>
          <li class="list-group-item">
            IoT applications for biomarker monitoring
          </li>
          <li class="list-group-item">
            Pattern recognition in psychological data
          </li>
          <li class="list-group-item">
            Data science for knowledge discovery in large
            user-generated datasets
          </li>
          <li class="list-group-item">
            Machine learning applications in mental health data
            analysis
          </li>
          <li class="list-group-item">
            Research on mental health status at various demographic
            levels
          </li>
          <li class="list-group-item">
            Serious video game development for mental health
          </li>
          <li class="list-group-item">
            Data processing and analysis focused on emotion or mental
            health condition recognition
          </li>
        </ul>
        <?php
        renderCfpCard('Focus Areas', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>ICAIMH 2026 welcomes four types of submissions:</p>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">Long Papers (8-12 pages)</h3>
          <p>
            Full research papers presenting original, high-quality
            contributions.
          </p>
          <ul>
            <li>
              The most outstanding submissions will be considered for
              publication in <em>Inteligencia Artificial</em>, a
              <strong>JCR-indexed</strong> international open-access
              journal.
            </li>
            <li>
              Submissions can be written in
              <strong>English or Spanish</strong>.
            </li>
            <li>
              If a submission is not among the top-ranked for
              <em>Inteligencia Artificial</em> but still demonstrates
              significant academic merit, the authors will be given
              the <strong>option</strong> to have their work
              considered for publication in the
              <em>Journal of Artificial Intelligence in Computing
                Applications (JAICA)</em>
              <strong>after receiving notification of acceptance</strong>.
            </li>
            <li>
              Since <em>JAICA</em>
              <strong>only accepts publications in English</strong>,
              if a submission originally written in
              <strong>Spanish</strong> is accepted for <em>JAICA</em>,
              the authors will be
              <strong>required to provide an English version for the
                camera-ready submission</strong>. To facilitate this process, the
              <em>JAICA</em> editorial team will offer
              <strong>support in translation</strong>.
            </li>
            <li>
              <strong>Conference Abstract Requirement:</strong>
              Authors of all long papers
              <strong>must also submit a conference abstract (1-2
                pages),</strong>
              which will be
              <strong>included in a Special Issue of <em>JAICA</em></strong>, serving as the
              <strong>official conference proceedings</strong> of
              ICAIMH 2026. Conference abstracts must be written in
              <strong>English</strong>, regardless of the original
              language of the main paper.
            </li>
          </ul>
        </div>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">Expanded Abstracts (4-6 pages)</h3>
          <p>
            Articles presenting preliminary results, novel ideas, or
            significant perspectives.
          </p>
          <ul>
            <li>
              Accepted expanded abstracts will be published as part of
              the <strong>Special Issue</strong> in <em>JAICA</em>.
            </li>
            <li>
              Since
              <strong>these submissions are not published elsewhere</strong>, they
              <strong>do not require a separate conference abstract</strong>.
            </li>
          </ul>
        </div>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">
            Critical Position and Perspective Papers (CPPP) (8-12
            pages)
          </h3>
          <p>
            Submissions discussing
            <strong>theoretical perspectives, ethical considerations, or
              potential applications</strong>
            of AI in mental health
            <strong>without requiring experimental validation</strong>.
          </p>
          <ul>
            <li>
              CPPP submissions will be published
              <strong>exclusively</strong> in <em>JAICA</em> and will
              <strong>not</strong> be considered for
              <em>Inteligencia Artificial</em>.
            </li>
            <li>
              <strong>Conference Abstract Requirement:</strong>
              <strong>A conference abstract (1-2 pages) must be
                submitted</strong>
              and will be included in the
              <strong>conference proceedings</strong>. Conference
              abstracts must be written in <strong>English</strong>,
              regardless of the original language of the main paper.
            </li>
          </ul>
        </div>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">
            Oral Presentations for Previously Published Work
          </h3>
          <p>
            Submissions of
            <strong>previously published papers</strong> to be
            presented orally at the conference.
          </p>
          <ul>
            <li>
              ICAIMH 2026 welcomes submissions for
              <strong>oral presentations</strong> of papers that have
              been <strong>published elsewhere</strong> within the
              past year (from <strong>July 2024 onwards</strong>).
            </li>
            <li>
              These papers
              <strong>will not be republished</strong> but will
              provide an opportunity for
              <strong>selected authors</strong> to present their work
              to the ICAIMH audience and foster
              <strong>interdisciplinary discussion</strong>.
            </li>
            <li>
              <strong>Submissions will undergo a selection process</strong>, and only approved works will be accepted for
              presentation.
            </li>
            <li>
              Authors must provide the
              <strong>DOI of the published article</strong> as part of
              their submission.
            </li>
            <li>
              <strong>All authors of the original paper must provide
                explicit consent</strong>
              via a signed letter confirming their agreement to have
              their work presented at ICAIMH 2026.
            </li>
            <li>
              <strong>Conference Abstract Requirement:</strong>
              <strong>A conference abstract (1-2 pages) must be
                submitted</strong>, which will be included in the
              <strong>conference proceedings</strong>. Conference
              abstracts must be written in <strong>English</strong>,
              regardless of the original language of the main paper.
            </li>
          </ul>
        </div>
        <?php
        renderCfpCard('Types of Submissions', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>
          All submissions must be formatted according to the
          <strong>official ICAIMH 2026 templates</strong>, available
          in <strong>Word and LaTeX</strong>. The use of
          <strong>LaTeX is strongly recommended</strong> for ease of
          formatting and compliance with publication standards.
        </p>

        <h3 class="h5 mt-4">Formatting Requirements</h3>
        <p>
          Authors must use the appropriate
          <strong>ICAIMH 2026 template</strong> based on their
          submission type:
        </p>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>Template Type</th>
                <th>Long Papers</th>
                <th>Expanded Abstracts</th>
                <th>CPPP</th>
                <th>Conference Abstracts</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>LaTeX project</strong></td>
                <td>
                  <a
                    href="https://drive.google.com/file/d/1h4TG18a_FZZrnu4V96v7_r-BcvICIbGP/view?usp=sharing"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://drive.google.com/file/d/1hEZOo-8hvnj7qOvp1HtlvdJxQjTPXPOr/view?usp=sharing"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://drive.google.com/file/d/1iEFAJ65topdlIq5gaAuoGhIwh096yhIg/view?usp=sharing"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://drive.google.com/file/d/1iNNNiuzQRJR1GrUT0P91LG9dLlqSLX74/view?usp=sharing"
                    target="_blank">Download</a>
                </td>
              </tr>
              <tr>
                <td><strong>Overleaf template</strong></td>
                <td>
                  <a
                    href="https://www.overleaf.com/read/hnbvwdwtjpwq#f4bb8d"
                    target="_blank">Open</a>
                </td>
                <td>
                  <a
                    href="https://www.overleaf.com/read/vzrycfxbpjqz#0b83cb"
                    target="_blank">Open</a>
                </td>
                <td>
                  <a
                    href="https://www.overleaf.com/read/ghdshchncyvh#946c47"
                    target="_blank">Open</a>
                </td>
                <td>
                  <a
                    href="https://www.overleaf.com/read/fxffqnfsvvxv#24c522"
                    target="_blank">Open</a>
                </td>
              </tr>
              <tr>
                <td><strong>Word template</strong></td>
                <td>
                  <a
                    href="https://docs.google.com/document/d/1Y-OYA4J9FPoEVVXMAwTGxtWGs6kB5mM9/edit?usp=sharing&ouid=109767813289528158557&rtpof=true&sd=true"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://docs.google.com/document/d/1hHr9ZLXc8i939nk12BlkEmfSswP6NG0P/edit?usp=sharing&ouid=109767813289528158557&rtpof=true&sd=true"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://docs.google.com/document/d/1hL0SkokM-z6IZ0ZhpAUCjeKDHRy2IzFG/edit?usp=sharing&ouid=109767813289528158557&rtpof=true&sd=true"
                    target="_blank">Download</a>
                </td>
                <td>
                  <a
                    href="https://docs.google.com/document/d/1i9TyrmzKmRCGyn-gIrM0h0a4rOz3l-sB/edit?usp=sharing&ouid=109767813289528158557&rtpof=true&sd=true"
                    target="_blank">Download</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <h3 class="h5 mt-4">
          Required Documents Based on Submission Type
        </h3>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>Submission Type</th>
                <th>Required Documents</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Long Papers</strong> (8-12 pages)</td>
                <td>
                  <strong>Full Paper</strong> (PDF) +
                  <strong>Conference Abstract</strong> (1-2 pages,
                  PDF)
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Expanded Abstracts</strong> (4-6 pages)
                </td>
                <td><strong>Expanded Abstract</strong> (PDF)</td>
              </tr>
              <tr>
                <td><strong>CPPP</strong> (8-12 pages)</td>
                <td>
                  <strong>Full Paper</strong> (PDF) +
                  <strong>Conference Abstract</strong> (1-2 pages,
                  PDF)
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Oral Presentations for Previously Published
                    Work</strong>
                </td>
                <td>
                  <strong>Conference Abstract</strong> (1-2 pages,
                  PDF) + <strong>DOI of Published Paper</strong> +
                  <strong>Signed Consent Letter from All Authors</strong>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php
        renderCfpCard('Submission Guidelines', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <div class="alert alert-success">
          <p class="mb-0">
            <strong>ICAIMH</strong> has partnered with the
            <strong>Journal of Artificial Intelligence and Computing
              Applications (JAICA)</strong>
            to handle all <strong>ICAIMH 2026</strong> submissions.
            Submissions must be made electronically via the JAICA
            submission platform:
            <a
              href="https://maikron.org/jaica/index.php/ojs/icaimh2026"
              class="alert-link"
              target="_blank">https://maikron.org/jaica/index.php/ojs/icaimh2026</a>
          </p>
        </div>

        <div class="process-steps">
          <div class="process-step mt-4">
            <div class="row">
              <div class="col-md-3">
                <div
                  class="process-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                  style="width: 60px; height: 60px">
                  <h3 class="h4 mb-0">1</h3>
                </div>
              </div>
              <div class="col-md-9">
                <h3 class="h5 fw-bold">Step 1: Create an Account</h3>
                <ul class="list-group list-group-flush mb-3">
                  <li class="list-group-item bg-light">
                    Authors must register an account on the JAICA
                    platform before submitting.
                  </li>
                  <li class="list-group-item bg-light">
                    If you already have an account, simply log in and
                    proceed with your submission.
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="process-step mt-4">
            <div class="row">
              <div class="col-md-3">
                <div
                  class="process-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                  style="width: 60px; height: 60px">
                  <h3 class="h4 mb-0">2</h3>
                </div>
              </div>
              <div class="col-md-9">
                <h3 class="h5 fw-bold">
                  Step 2: Select the Correct Submission Category
                </h3>
                <p>
                  During submission, authors must select the
                  appropriate section for their work:
                </p>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <td>ICAIMH 2026 - Long Papers</td>
                      </tr>
                      <tr>
                        <td>ICAIMH 2026 - Expanded Abstracts</td>
                      </tr>
                      <tr>
                        <td>
                          ICAIMH 2026 - CPPPs (Critical Position and
                          Perspective Papers)
                        </td>
                      </tr>
                      <tr>
                        <td>ICAIMH 2026 - Oral Presentations</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="process-step mt-4">
            <div class="row">
              <div class="col-md-3">
                <div
                  class="process-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                  style="width: 60px; height: 60px">
                  <h3 class="h4 mb-0">3</h3>
                </div>
              </div>
              <div class="col-md-9">
                <h3 class="h5 fw-bold">
                  Step 3: Upload Your Files (Double-Blind Review
                  Process)
                </h3>
                <ul class="list-group mb-3">
                  <li class="list-group-item">
                    <i
                      class="bi bi-file-earmark-pdf text-danger me-2"></i>
                    Only PDF files should be uploaded at this stage.
                    Source files (LaTeX/Word) will be requested only
                    for accepted submissions.
                  </li>
                  <li class="list-group-item">
                    <i
                      class="bi bi-shield-check text-success me-2"></i>
                    Ensure that no author names or identifying
                    information appear in the document, maintaining
                    compliance with the double-blind review process.
                  </li>
                  <li class="list-group-item">
                    <i
                      class="bi bi-exclamation-triangle text-warning me-2"></i>
                    <strong>Submissions that do not follow this guideline
                      will be desk-rejected.</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="process-step mt-4">
            <div class="row">
              <div class="col-md-3">
                <div
                  class="process-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                  style="width: 60px; height: 60px">
                  <h3 class="h4 mb-0">4</h3>
                </div>
              </div>
              <div class="col-md-9">
                <h3 class="h5 fw-bold">
                  Step 4: Camera-Ready Version (For Accepted
                  Submissions)
                </h3>
                <div class="card border-success mb-3">
                  <div class="card-header bg-success text-white">
                    If your submission is accepted:
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        You must submit the source files (LaTeX or
                        Word) following the ICAIMH 2026 formatting
                        guidelines.
                      </li>
                      <li class="list-group-item">
                        The ICAIMH and JAICA editorial teams will
                        assist in the final publication process,
                        considering authors' compliance with reviewer
                        comments and conference requirements.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        renderCfpCard('Submission Process', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>To ensure the quality and sustainability of ICAIMH 2026, a publication fee of $1,000 MXN will be required for each accepted submission.</p>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">This fee covers:</h3>
          <ul>
            <li>
              Publication in one of the conference's associated journals (Inteligencia Artificial or JAICA).
            </li>
            <li>
              Certificate of participation.
            </li>
            <li>
              Welcome kit.
            </li>
          </ul>
          <p>
            Payment details and invoicing instructions will be provided to authors upon acceptance of their submission.
          </p>
          <p>
            For questions regarding payment or billing, please contact us at <a href="mailto:icaimh2026@icaimh.org">icaimh2026@icaimh.org</a>.
          </p>
        </div>
        <?php
        renderCfpCard('Publication Cost', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card h-100 border-primary">
              <div class="card-body text-center">
                <h3 class="h5">Submission Deadline</h3>
                <p class="h5 text-primary" style="text-decoration: line-through;">TBD</p>
                <p class="h4 text-primary">TBD</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 border-primary">
              <div class="card-body text-center">
                <h3 class="h5">Notification of Acceptance</h3>
                <p class="h5 text-primary" style="text-decoration: line-through;">TBD</p>
                <p class="h4 text-primary">TBD</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card h-100 border-primary">
              <div class="card-body text-center">
                <h3 class="h5">Camera-Ready Submission</h3>
                <p class="h5 text-primary " style="text-decoration-line: line-through;">TBD</p>
                <p class="h4 text-primary">TBD</p>
              </div>
            </div>
          </div>
        </div>
        <?php
        renderCfpCard('Important Dates', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <div class="text-center">
          <p>
            We look forward to your contributions to ICAIMH 2026, where
            research innovations in AI for mental health will continue
            to push the boundaries of interdisciplinary collaboration.
          </p>
          <p>
            For inquiries, please contact
            <a href="mailto:icaimh2026@icaimh.org">icaimh2026@icaimh.org</a>
          </p>
          <div class="alert alert-warning" role="alert">
            <strong>Join us in advancing AI innovations for mental health
              solutions at ICAIMH 2026!</strong>
          </div>
        </div>
        <?php
        renderCfpCard(null, ob_get_clean());
        ?>
      </div>
    </div>
  </div>
</section>

<!-- ======= End of Call for Papers Section ======= -->
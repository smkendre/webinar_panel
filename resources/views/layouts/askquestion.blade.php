<div id="askaquestion" class="popmain3">
  <div class="popmainheading">Ask a Question</div>
  <div class="popmain1con1">
      <div class="popupformmain1">
          <form id="qsansFrm" name="qsansFrm" method="POST" action="" role="form">
             @csrf
              <div class="popupformmain1box">
                  <label>Question</label>
                  <textarea rows="5" cols="2" id="question" name="question" placeholder="Type your question here..."></textarea>
              </div>
              <button type="submit" id="submit" name="submit" class="button">Send</button>
          </form>
      </div>
  </div>
</div>
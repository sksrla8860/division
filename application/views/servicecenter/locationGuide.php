<link rel="stylesheet" type="text/css" href="/assets/css/servicecenter/online_consultation.css"/>
    <div class="container">
        <div class="section">
            <div class="title_box">
                <h3>캠퍼스 위치안내</h3>
                <p> * 은 필수 입력 사항입니다.</p>
            </div>
            <div class="form_box">
                <form action="/servicecenter/locationGuide" method="post" name="frm" id="frm">
								<input name="code" id="code" type="hidden" value="p"/>
                    <fieldset>
                        <legend>위치안내</legend>
                        <div class="campus_box">
                            <label for="cam_idx">* 캠퍼스</label>
                            <div><input type="text" disabled name="cam_idx" id="cam_idx" value="<? if($this->uri->segment(3)){ echo(getCampusName($this->uri->segment(3))); }else{ echo(getCampusName($manger->m_cam)); } ?>" /></div>
                        </div>
                        <div class="name_box">
                            <label for="i_writer">* 이름</label>
                            <div>
                                <input type="text" name="i_writer" id="i_writer" class="name_text" value="" />
                            </div>
                        </div>
                        <div class="number_box">
                            <label for="i_num">* 연락처</label>
                            <div>
                                <input type="text" name="i_num" id="i_num" class="number_text num_only" maxlength="11" value=""  required placeholder="연락받으실 번호를 입력해주세요." />
                            </div>
                        </div>
                        <div class="e_mail_box">
                            <label for="c_email">이메일</label>
                            <div>
                                <input type="text" name="email1" id="email1" value="" />
                                <p>@</p>
                                <input type="text" id="email2" name="email2" maxlength="20" title="이메일 도메인">
                                <select id="email3" name="email3" onchange="document.getElementById('email2').value=this.value" title="이메일 도메인 선택">
																<option value="">직접입력</option>
																<option value="gmail.com" title="gmail.com"> 지메일 </option>
																<option value="naver.com" title="naver.com"> 네이버</option>
																<option value="hanmail.net" title="hanmail.net"> 한메일(다음) </option>
																<option value="nate.com" title="nate.com"> 네이트</option>
																<option value="hotmail.com" title="hotmail.com"> 핫메일 </option>
																<option value="paran.com" title="paran.com"> 파란(다음) </option>
																<option value="chollian.net" title="chollian.net"> 천리안 </option>
																<option value="hitel.net" title="hitel.net"> 하이텔 </option>
																<option value="unitel.co.kr" title="unitel.co.kr"> 유니텔 </option>
																<option value="korea.com" title="korea.com"> 코리아닷컴 </option>
																<option value="kebi.com" title="kebi.com"> 깨비메일 </option>
																<option value="netian.com" title="netian.com"> 네띠앙 </option>
																<option value="lycos.co.kr" title="lycos.co.kr"> 라이코스 </option>
																<option value="yahoo.co.kr" title="yahoo.co.kr"> 야후</option>
																<option value="dreamx.net" title="dreamx.net"> 드림엑스 </option>
										</select>
                            </div>
                        </div>
                        <div class="agreement_box">
                            <label for="agreement" class="agreement">* 개인정보 수집<br />및 이용동의</label>
                            <div>
                                <p>(주)지아이티아카데미는 온라인상담을 이용하기 원하는 분을 대상으로 아래와 같이 개인정보를 수집하고 있습니다.<br />
                                -수집항목 : [필수] 성명, 이메일주소, 연락처<br />
                                -개인정보의 수집 및 이용목적 : 온라인상담에 따른 본인확인 및 원활한 의사소통 경로 확보<br />
                                -보유 및 이용기간 : 모든 검토가 완료된 후 3년간 이용자의 조회를 위하여 보관하며, 이 후 해당정보를 지체없이 파기합니다.<br />
                                -동의 거부권리 안내 추가 :위와 같은 개인정보 수집 동의를 거부할 수 있습니다. 다만 동의를 거부하는 경우 온라인상담 이용이 제한될 수 있습니다.<br />
                                그 밖의 사항은 <a href="#취급방침보기" onclick="window.open('/member/policy17.asp','','width=700,height=640,scrollbars=auto;');return false;" title="새창으로 개인정보취급방침 이동" class="bluePoint">개인정보취급방침</a>을 준수합니다.</p>
                                <input type="checkbox" name="agree" id="agree" value="" />
                                <label for="agree">개인정보수집 및 이용에 동의합니다.</label>
                            </div>
                        </div>
                        <div class="btn_box">
                            <input type="submit" id="okBtn" name="okBtn" value="등록하기"/>
                            <input type="reset" id="cancleBtn" name="cancleBtn" value="등록취소" />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>
		<!-- contents 끝 -->
<script type="text/javascript">
$('form[name=frm]').submit(function(){
	if (!$('#cam_idx').val()){
		alert("캠퍼스를 선택하세요.");
		$('#cam_idx').focus();
		return false;
	}
	if (!Trim($('#c_name').val())){
		alert("이름을 입력해주세요.");
		$('#c_name').focus();
		return false;
	}
	if (!Trim($('#c_tel').val())){
		alert("연락처를 입력해주세요.");
		$('#c_tel').focus();
		return false;
	}
	var telNumber = $('#c_tel').val();
	if (!checkPhoneNumber(telNumber)){
		alert("전화번호나 핸드폰번호의 형식이 맞지 않습니다. \n정확하게 입력해주세요.");
		return false;
	}
	if (!$('#agree').is(':checked')){
		alert("약관 및 정책에 동의해야 합니다.");
		$('#agree').focus();
		return false;
	}
});
</script>
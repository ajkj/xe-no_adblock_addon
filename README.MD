# no adblock
adblock 사용을 제한하는 애드온 입니다.

광고 수익으로 운영되는 웹사이트에서 임의로 광고를 차단하는것은, 웹사이트의 서버 자원을 무상으로 사용하겠다는 의사를 표현한 것이라 생각합니다.

본 애드온은 adblock을 사용하는지를 체크하여, adblock 사용 통계 및 adblock 사용시 관련된 안내 메시지를 내보낼 수 있도록 도와줍니다.

운영하시는 웹사이트 정책에 맞게 애드온 설치하시면 도움이 될거에요.


### 기능
- Google Analytics와 연계하여 Adblock을 사용할 경우 event를 전송하여, adblock 사용자에 대한 통계를 낼 수 있습니다.
- adblock을 사용하는 유저에게 애드온에 내장된 modal 창을 이용하여 경고 메시지 보여주거나, 원하는 javascript를 실행 할 수 있습니다.
- AJAX post를 통해서 script를 가져옴으로서 adblock에 의해 차단당하지 않습니다.


#### 요구사항
PHP 5.2+ , XE1.7 이상이면 모두 정상작동 할 것으로 생각합니다.
다만 개발 및 테스트는 PHP 5.5 + XE1.8 에서만 진행하였으니, 이용하시는 분들의 유의가 필요합니다.


### 라이센스
MIT
The MIT License (MIT)

Copyright (c) 2015 AJKJ <thename@requery.me>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.




#### 본 애드온에 사용된 라이브러리 및 라이센스
 https://github.com/sitexw/FuckAdBlock
 
 The MIT License (MIT)
 
 Copyright (c) 2015 Valentin Allaire <valentin.allaire@sitexw.fr>
 
 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 SOFTWARE.
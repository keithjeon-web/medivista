# MEDIVISTA 통합 Shop WordPress 관리자 매뉴얼

업데이트: 2026-06-19

별도 `shop.medivista.co.kr` 사이트는 운영하지 않습니다. `www.medivista.co.kr`의 기존 `MEDIVISTA Starter` 테마 안에서 WooCommerce Shop을 운영합니다.

## 초기 설정

1. 사이트 파일과 데이터베이스를 백업합니다.
2. 최신 `wp-theme-starter.zip`을 업로드하고 `MEDIVISTA Starter`를 활성화합니다.
3. WooCommerce를 설치하고 같은 사이트에서 활성화합니다.
4. Shop, Cart, Checkout, My Account 페이지를 생성합니다.
5. 통화, 결제, 쿠폰, 배송, 세금, 개인정보, 이용약관, 환불/교환 정책을 설정합니다.
6. 실결제 전 테스트 모드 주문을 완료합니다.

## 상품 관리

- 상품은 먼저 비공개 초안으로 등록합니다.
- 가격, 재고, 배송, 규정 문구, 환불 정책을 확인한 뒤 공개합니다.
- 기업/대량 주문은 WhatsApp 문의 안내를 함께 사용할 수 있습니다.

## 한국 IP 제한

- 한국 IP 방문자는 Shop, 상품 구매, Cart, Checkout, My Account 경로에 접근할 수 없습니다.
- 회사 소개, 제품 카탈로그, 브랜드, 블로그, 문의 페이지는 접근 가능합니다.
- Administrator와 Shop Manager는 제한에서 제외됩니다.
- CDN, WAF, 호스팅 또는 GeoIP 플러그인이 국가 코드를 WordPress에 전달해야 합니다.
- WooCommerce 판매/배송 가능 국가에서 South Korea를 제외합니다.

## 운영 확인

- 헤더 메뉴는 `SHOP`이며 `BRAND SHOP` CTA는 없어야 합니다.
- 회사/카탈로그 페이지에는 가격과 Add to Cart가 없어야 합니다.
- 결제, 배송, 세금, 개인정보, 약관, 환불 정책 승인 전에는 실결제를 활성화하지 않습니다.

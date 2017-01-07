<?php

/**
 * Smart Custom Fieldsの定義用クラス
 * グループごとにメソッドを作ると良い
 *
 * @link https://2inc.org/blog/2015/03/12/4670/
 */
Class Test_SmartCustomFields {

	/**
	 * ロードするメソッド名を配列で列挙する。
	 * add_filterされます。
	 *
	 * @var String[]
	 */
	private static $load_groups = array(
		'front_page_slider',
		'test',
	);

	/**
	 * このクラス内にあるメソッドをロードさせるようにする。
	 */
	public static function load_scf_groups() {
		foreach ( self::$load_groups as $group ) {
			add_filter( 'smart-cf-register-fields',
				array( __CLASS__, $group ), 10, 4 );
		}
	}

	public static function test( $settings, $type, $id, $meta_type ) {
		if ( $type !== 'page' ) {
			return $settings;
		}

		/** @var Smart_Custom_Fields_Setting $Setting */
		$Setting = SCF::add_setting( 'test-group-1', '固定ページ用テスト' );

		// $Setting->add_group( 'ユニークなID', 繰り返し可能か, カスタムフィールドの配列 );
		$Setting->add_group( 'front-page-slider', false, array(
			array(
				'type'        => 'text',
				'name'        => 'scf-1',
				'label'       => 'テキストのテストです',
				'default'     => 'デフォルト値',
				'instruction' => '',
				'notes'       => 'ここに注記を入れてください'
			),
			array(
				'type'        => 'boolean',                       // タイプ
				'name'        => 'scf-2',                         // 名前
				'label'       => '真偽値のテストです',               // ラベル
				'default'     => true,                            // デフォルト
				'true_label'  => 'はい',                           // TRUE ラベル
				'false_label' => 'いいえ',                         // FALSE ラベル
				'instruction' => 'ここにテキストを入力してください。', // 説明文
				'notes'       => 'ここに注記を入れてください',        // 注記
			),
			array(
				'type'        => 'textarea',                       // タイプ
				'name'        => 'scf-3',                         // 名前
				'label'       => '真偽値のテストです',               // ラベル
				'default'     => 'デフォルトのテキストです',                            // デフォルト
				'rows'        => 5,                               // 行数
				'instruction' => 'ここにテキストを入力してください。', // 説明文
				'notes'       => 'ここに注記を入れてください',        // 注記
			),
		) );

		$settings[] = $Setting;

		return $settings;
	}

	/**
	 * 管理画面のメニューを作成する。
	 */
	public static function create_admin_menu() {
		/**
		 * @param string $page_title ページのtitle属性値
		 * @param string $menu_title 管理画面のメニューに表示するタイトル
		 * @param string $capability メニューを操作できる権限（manage_options とか）
		 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
		 * @param string|null $icon_url メニューに表示するアイコンの URL
		 * @param int $position メニューの位置
		 */
		SCF::add_options_page( 'トップページスライダー',   'トップページスライダー',  'manage_options', 'slider-options' );
		SCF::add_options_page( '製品アーカイブ',          '製品アーカイブ',         'manage_options', 'product-options' );
		SCF::add_options_page( 'ソリューションアーカイブ', 'ソリューションアーカイブ', 'manage_options', 'solution-options' );
		SCF::add_options_page( 'お知らせアーカイブ',      'お知らせアーカイブ',      'manage_options', 'news-options' );
		SCF::add_options_page( 'セミナーアーカイブ',      'セミナーアーカイブ',      'manage_options', 'seminar-options' );
	}

	public static function test1( $settings, $type, $id, $meta_type ) {

		$Setting = SCF::add_setting( 'id-1', 'functions.php から追加 その1' );

		// $Setting->add_group( 'ユニークなID', 繰り返し可能か, カスタムフィールドの配列 );
		$Setting->add_group( 'group-name-1', false, array(
			array(
				'name'  => 'field-1',
				'label' => 'テストフィールド',
				'type'  => 'text',
			),
			array(
				'name'    => 'field-2',
				'label'   => 'テストフィール2',
				'type'    => 'text',
				'default' => 2,
			),
		) );

		$settings[] = $Setting;

		return $settings;
	}

	/**
	 * フロントページメインビジュアル部分、スライダーオプション用。
	 * スライダーの設定は管理画面から行う。
	 *
	 * @param Smart_Custom_Fields_Setting[] $settings
	 * @param String[] $type post_type or option_name  ex.) 'product', 'event' or 'slider-options'
	 * @param $id
	 * @param $meta_type
	 *
	 * @return Smart_Custom_Fields_Setting[]
	 */
	public static function front_page_slider( $settings, $type, $id, $meta_type ) {
		if ( $type !== 'slider-options' ) {
			return $settings;
		}

		/** @var Smart_Custom_Fields_Setting $Setting */
		$Setting = SCF::add_setting( 'front-page-slider', 'スライダー' );

		// $Setting->add_group( 'ユニークなID', 繰り返し可能か, カスタムフィールドの配列 );
		$Setting->add_group( 'front-page-slider', true, array(
			array(
				'name'        => 'slider-image',
				'label'       => 'スライダー画像',
				'type'        => 'image',
				'instruction' => "サイズはxxx x xxxにしてください。altはメディアの設定が適用されます。",
			),
			array(
				'name'        => 'slider-id',
				'label'       => 'スライダーCSS用ID',
				'type'        => 'text',
				'instruction' => 'CSSやJS用のID指定をこちらに入力してください。',
			),
			array(
				'name'        => 'slider-heading',
				'label'       => 'スライダー用見出しHTML',
				'type'        => 'textarea',
				'instruction' => 'imgタグの直前に挿入されるタグです。'
			),
			array(
				'name'  => 'slider-href',
				'label' => 'リンク先URL',
				'type'  => 'text',
			),
		) );

		$settings[] = $Setting;

		return $settings;
	}

}
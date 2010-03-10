

Ext.namespace('tx','tx.caretaker');

tx.caretaker.NodeAccounts = Ext.extend( Ext.grid.GridPanel , {

    constructor: function(config) {

		this.json_data_store = new Ext.data.JsonStore({
			root: 'accounts',
			totalProperty: 'totalCount',
			idProperty: 'id',
			remoteSort: false,
			fields: [
				'num','id',
				'node_title','node_type','node_type_ll','node_id',
				'account_username', 'account_password', 'account_url',
				'type_name',
				'url'
			],
			proxy: new Ext.data.HttpProxy({
				url: config.back_path + 'ajax.php?ajaxID=tx_caretaker_accounts::nodeaccounts&node=' + config.node_id
			})
		});
		
		this.renderNode = function( value, metaData, record, rowIndex, colIndex, store ){

			var type = value;
			if ( record.data.node_type_ll  )  type += ' [' + record.data.node_type_ll + ']' ;

			return type;
		}

		this.renderURL = function(  value, metaData, record, rowIndex, colIndex, store ){

			return '<a href="' + value + ' " >' + 'click'  + '</a>';

		}

		
		this.column_model = new Ext.grid.ColumnModel({
			defaults: {
				sortable: true
			},
			columns: [
			{
				header: "Type",
				dataIndex: 'type_name'
			},{
				header: "Node",
				dataIndex: 'node_title',
				renderer:{ fn: this.renderNode, scope: this }
			},{
				header: "Username",
				dataIndex: 'account_username'
			},{
				header: "Pssword",
				dataIndex: 'account_password'
			},{
				header: 'URL',
				dataIndex: 'url',
				renderer:{ fn: this.renderURL, scope: this }

			}
			]
		});

		this.column_view = new Ext.grid.GridView({
			enableRowBody: true,
			showPreview: true,
			getRowClass: function(record, index) {
				return 'tx_caretaker_node_logrow tx_caretaker_node_logrow_OK';
			}
		});

		config = Ext.apply({
			iconCls: 'tx-caretaker-panel-nodeaccounts',
			collapsed        : true,
			collapsible      : true,
			stateful         : true,
			stateEvents      : ['expand','collapse'],
			stateId          : 'tx.caretaker.NodeAccounts',
			title            :'Accounts',
			titleCollapse    : true,
			store            : this.json_data_store,
			trackMouseOver   : false,
			disableSelection : true,
			loadMask         : true,
			autoHeight       : true,
			colModel         : this.column_model,
			view             : this.column_view

		}, config);

		tx.caretaker.NodeAccounts.superclass.constructor.call(this, config);

		if (this.collapsed == false){
			this.json_data_store.load();
		}

		this.on('expand', function(){
			this.json_data_store.load();
		}, this);


	},

	getState: function() {
		var state = {
			collapsed: this.collapsed
		};
		return state;
	}

});

Ext.reg( 'caretaker-nodeaccounts', tx.caretaker.NodeAccounts );
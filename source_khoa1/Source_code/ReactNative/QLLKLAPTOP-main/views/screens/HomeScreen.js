import React, {Component} from 'react';
import {
  View,
  Text,
  Image,
  TouchableOpacity,
  StyleSheet,
  FlatList,
  Dimensions,
  ScrollView
} from 'react-native';

const width = Dimensions.get('screen').width / 2 - 20;

let CPU = require('../../products/products.json');
let RAM = require('../../products/products2.json');
let MAIN = require('../../products/products3.json');
let GPU = require('../../products/products4.json');

export default class HomeScreen extends Component {
  constructor(props) {
    super(props);
    this.navigation = props.navigation;
    
    this.gotoDetail = this.gotoDetail.bind(this);
    this.renderListProducts = this.renderListProducts.bind(this);
    this.state = {
      data: CPU.products,
    };
  }
  gotoDetail(product) {
    this.navigation.navigate('Detail', product);
 }
  renderListProducts(products) {
    this.setState(this.state.data=products)
  }
  render() {
    const Card=({product})=>{
      return (
        <TouchableOpacity onPress={() => this.gotoDetail(product)}>
          <View style={styles.Card}>
                <View style={styles.cardImg}>
                    <Image 
                  style={styles.img1}
                  source={{uri: product.img}}/>                           
                </View>

                <View style={{padding: 10}}>
                  <Text style={styles.productName}>
                    {product.name}
                  </Text>
                </View>
                
                <View style={{padding: 10, paddingBottom: 150}}>
                    <Text style={styles.productPrice}>
                        $ {product.price}
                    </Text>
                </View>
            </View>
    </TouchableOpacity>
    );
};
    return(           
      <View style={{backgroundColor: '#202020', paddingBottom: 50}}>   
        <View style={{
            paddingTop: 30, 
            backgroundColor: '#020202',
            paddingBottom: 5,
            shadowColor: 'black',
            shadowOffset: {width: 0, height:4 },
            shadowOpacity: 0.5,
            shadowRadius: 3,
            borderRadius: 4,
            elevation: 3
          }}>
            <View style={{alignItems: 'center', padding: 5}}>
              <Text style={{color: 'white', fontSize: 16, fontWeight: 'bold'}}>Home</Text>
            </View>
            
        <ScrollView horizontal showsHorizontalScrollIndicator={false} contentContainerStyle={styles.categoriesListContainer}>
          <View style={styles.barContainer}>
            <TouchableOpacity 
              style={styles.categoryContainer}
              onPress={() => this.renderListProducts(CPU.products)}
            >
              <Text style={styles.categoryText}>
                CPU
              </Text>
            </TouchableOpacity>
         
            <TouchableOpacity 
              style={styles.categoryContainer}
              onPress={() => this.renderListProducts(RAM.products)}
            >
<Text style={styles.categoryText}>
                RAM
              </Text>
            </TouchableOpacity>

            <TouchableOpacity 
              style={styles.categoryContainer}
              onPress={() => this.renderListProducts(MAIN.products)}
            >
              <Text style={styles.categoryText}>
                MAIN
              </Text>
            </TouchableOpacity>

            <TouchableOpacity 
              style={styles.categoryContainer}
              onPress={() => this.renderListProducts(GPU.products)}
            >
              <Text style={styles.categoryText}>
                GPU
              </Text>
            </TouchableOpacity>
          </View>
        </ScrollView>
        </View>
        

        <FlatList 
          numColumns={2}
          data={this.state.data}
          renderItem={({item}) => <Card product={item} />}
          columnWrapperStyle={{justifyContent: 'space-between'}}
          showsHorizontalScrollIndicator={false}
          contentContainerStyle={{
            padding: 15,
            paddingBottom: 90
          }}
        />
      </View>
    );
  }
}

const styles = StyleSheet.create({
  productName:{
    fontSize:14,
    textAlign:'left',
    fontWeight:'bold', 
    color: '#dadada'
  },
  productPrice:{
    fontSize:14,
    color: '#bdbdbd',
    textAlign:'right',
    fontWeight:'bold',
  },
  img1:{
    flex: 1,
    height: 190,
    width: 175,
    borderTopLeftRadius:4,
    borderTopRightRadius:4,
    opacity: 0.7
  },
  addButtonContainer:{
    height:25,
    width: 25,
    backgroundColor:'black',
    borderRadius:5,
    justifyContent:'center',
    alignItems:'center',
    marginRight:10,
  },
  addButtonText:{
    fontSize:18,
    color:'#c6c6c6',
    fontWeight:'bold',
    flex:1,
  },
  Card: {
    flexDirection: 'column',
    backgroundColor:'#2a2a2a',
    height:305,
    width: 175,
    marginRight: 7,
    marginBottom: 20,
    elevation: 2,
    shadowColor: 'black',
    shadowOffset: {width: -4, height: 6},
    shadowOpacity: 0.5,
    shadowRadius: 3,
    borderRadius: 4,
  },
  cardImg:{
    height:190,
    width: 190,
  },
  categoriesListContainer: {
    paddingTop: 10,
    paddingBottom: 10,
  },
  CategorySelected: {
    color:'white',
    paddingBottom:5,
    borderBottomWidth:2,
    borderColor:'white',
  },
  categoryText: {
    fontSize: 14,
    color:'#121212',
    fontWeight:'bold',
    padding: 10
  },
  categoryContainer: {
    backgroundColor:'#03dac5',
    marginRight: 15,
    marginLeft: 15,
    paddingTop: 5,
    paddingBottom: 5,
    paddingLeft: 10,
    paddingRight: 10,
    borderRadius: 4,
    shadowColor: '#03dac5',
    shadowOffset: {width: 0, height: 4},
    shadowOpacity: 0.5,
    shadowRadius: 3
  },
 
  barContainer: {
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
  },

  header: { 
    flexDirection:'row',
    justifyContent:'space-between',
    backgroundColor:'white',
    padding: 10,
marginTop: 30,
  },
  container: {
    alignItems: 'center',
    justifyContent: 'center'
  },
  title: {
    fontSize: 40,
    fontWeight: 'bold',
    textAlign: 'center',
    marginBottom: 30
  },
  button: {
    borderWidth: 1,
    padding: 10,
    width: 150,
    alignItems: 'center',
    marginBottom: 10
  },
  buttonText: {
  },
});
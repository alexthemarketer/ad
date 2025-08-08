import React from 'react';
import { motion } from 'framer-motion';
import { Award, Star, Heart } from 'lucide-react';

const Team = () => {
  const teamMembers = [
    {
      name: 'Dra. Marina Silva',
      role: 'Diretora Clínica',
      specialty: 'Dermatologia Estética',
      experience: '15 anos',
      image: 'https://images.pexels.com/photos/5327585/pexels-photo-5327585.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&fit=crop',
      bio: 'Especialista em dermatologia estética com formação internacional. Pioneira em técnicas avançadas de rejuvenescimento.',
      certifications: ['CRM 12345-SP', 'Especialista SBD', 'Fellowship Harvard']
    },
    {
      name: 'Ana Carolina',
      role: 'Esteticista Senior',
      specialty: 'Tratamentos Faciais',
      experience: '10 anos',
      image: 'https://images.pexels.com/photos/5327921/pexels-photo-5327921.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&fit=crop',
      bio: 'Especializada em tratamentos faciais personalizados e técnicas de rejuvenescimento não invasivas.',
      certifications: ['CREF 123456-SP', 'Certificação CIDESCO', 'Pós-graduação USP']
    },
    {
      name: 'Juliana Santos',
      role: 'Terapeuta Corporal',
      specialty: 'Massoterapia',
      experience: '8 anos',
      image: 'https://images.pexels.com/photos/5327580/pexels-photo-5327580.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&fit=crop',
      bio: 'Especialista em massoterapia e drenagem linfática, com técnicas orientais e ocidentais.',
      certifications: ['CREFITO 12345-SP', 'Certificação Ayurveda', 'Formação Shiatsu']
    },
    {
      name: 'Camila Rodrigues',
      role: 'Consultora de Beleza',
      specialty: 'Harmonização Facial',
      experience: '6 anos',
      image: 'https://images.pexels.com/photos/5327584/pexels-photo-5327584.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&fit=crop',
      bio: 'Especializada em harmonização facial e procedimentos minimamente invasivos para realce da beleza natural.',
      certifications: ['Biomedicina CRB 12345', 'Especialização FMABC', 'Curso Internacional']
    }
  ];

  return (
    <section id="team" className="py-20 bg-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Nossa Equipe</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            Profissionais
            <span className="block text-gold-600">Especializados</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            Nossa equipe é formada por profissionais altamente qualificados, comprometidos em oferecer 
            os melhores cuidados estéticos com excelência e dedicação.
          </p>
        </motion.div>

        {/* Team Grid */}
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {teamMembers.map((member, index) => (
            <motion.div
              key={index}
              className="bg-white rounded-2xl shadow-lg overflow-hidden border border-cream-200 hover:shadow-xl transition-all duration-300"
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              viewport={{ once: true }}
              whileHover={{ y: -5 }}
            >
              {/* Image */}
              <div className="relative overflow-hidden">
                <img
                  src={member.image}
                  alt={member.name}
                  className="w-full h-64 object-cover transition-transform duration-300 hover:scale-110"
                />
                <div className="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                  <div className="flex items-center space-x-1 text-gold-600">
                    <Star size={14} fill="currentColor" />
                    <span className="text-sm font-medium">{member.experience}</span>
                  </div>
                </div>
              </div>

              {/* Content */}
              <div className="p-6">
                <h3 className="font-serif text-xl font-semibold text-sage-800 mb-1">
                  {member.name}
                </h3>
                <p className="text-gold-600 font-medium mb-2">{member.role}</p>
                <p className="text-sage-600 text-sm mb-4">{member.specialty}</p>
                
                <p className="text-sage-600 text-sm leading-relaxed mb-4">
                  {member.bio}
                </p>

                {/* Certifications */}
                <div className="mb-4">
                  <h4 className="text-xs font-semibold text-sage-700 mb-2 uppercase tracking-wider">
                    Certificações
                  </h4>
                  <div className="space-y-1">
                    {member.certifications.map((cert, idx) => (
                      <div key={idx} className="flex items-center space-x-2">
                        <Award size={12} className="text-gold-500" />
                        <span className="text-xs text-sage-600">{cert}</span>
                      </div>
                    ))}
                  </div>
                </div>

                {/* Specialty Badge */}
                <div className="bg-sage-50 rounded-lg p-3 text-center">
                  <div className="flex items-center justify-center space-x-2 text-sage-700">
                    <Heart size={16} className="text-gold-500" />
                    <span className="text-sm font-medium">Especialista em {member.specialty}</span>
                  </div>
                </div>
              </div>
            </motion.div>
          ))}
        </div>

        {/* Values Section */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="mt-20 bg-gradient-to-r from-cream-50 to-sage-50 rounded-2xl p-8 lg:p-12"
        >
          <div className="text-center mb-8">
            <h3 className="font-serif text-3xl font-semibold text-sage-800 mb-4">
              Nossos Valores
            </h3>
            <p className="text-sage-600 max-w-2xl mx-auto">
              Cada membro da nossa equipe compartilha dos mesmos valores fundamentais que norteiam 
              nosso trabalho e relacionamento com os clientes.
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            <div className="text-center">
              <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full mb-4">
                <Heart className="text-white" size={24} />
              </div>
              <h4 className="font-semibold text-sage-800 mb-2">Cuidado Personalizado</h4>
              <p className="text-sage-600 text-sm">
                Cada cliente é único e merece um atendimento personalizado e dedicado.
              </p>
            </div>

            <div className="text-center">
              <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-sage-400 to-sage-600 rounded-full mb-4">
                <Award className="text-white" size={24} />
              </div>
              <h4 className="font-semibold text-sage-800 mb-2">Excelência Técnica</h4>
              <p className="text-sage-600 text-sm">
                Comprometimento com a atualização constante e técnicas mais avançadas.
              </p>
            </div>

            <div className="text-center">
              <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gold-400 to-sage-500 rounded-full mb-4">
                <Star className="text-white" size={24} />
              </div>
              <h4 className="font-semibold text-sage-800 mb-2">Ética Profissional</h4>
              <p className="text-sage-600 text-sm">
                Transparência, honestidade e respeito em todas as nossas relações.
              </p>
            </div>
          </div>
        </motion.div>
      </div>
    </section>
  );
};

export default Team;